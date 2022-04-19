<template>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2"><i class="bi bi-list-check me-3"></i> Items</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-success"
                    data-bs-toggle="modal"
                    data-bs-target="#formModal"
                    v-on:click="addItem">
                <i class="bi bi-plus-circle-fill me-2"></i> Add a new item
            </button>
        </div>

    </div>

    <div class="row mb-3">

        <div class="col-md-2">
            <input type="text" v-model="name" name="name" id="name" class="form-control" placeholder="Name">
        </div>

        <div class="col-md-2">
            <select v-model="category" name="category" id="category" class="form-select">
                <option value="">Categories</option>
                <option v-for="(item, index) in categories" v-bind:value="index">{{ item }}</option>
            </select>
        </div>

        <div class="col-md-2">
            <input type="text" v-model="address" name="address" id="address" class="form-control" placeholder="Address">
        </div>

        <div class="col-md-2">
            <select v-model="is_active" name="is_active" id="is_active" class="form-select">
                <option value="">Activity</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="col-md-2">
            <button type="button" id="clearFilters" class="btn btn-outline-secondary" v-on:click="clearFilters">
                <i class="bi bi-x-circle me-2"></i> Clear Filters
            </button>
        </div>

    </div>

    <div class="table-responsive" v-if="meta.total > 0">
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>
                    <span  class="cursor-pointer" v-on:click="sorting('created_at')">
                        Created At
                        <SortUp v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="created_at"></SortUp>
                        <SortDown v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="created_at"></SortDown>
                    </span>
                </th>
                <th>
                    <span  class="cursor-pointer" v-on:click="sorting('name')">
                        Name
                        <SortUp v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="name"></SortUp>
                        <SortDown v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="name"></SortDown>
                    </span>
                </th>
                <th>
                    <span  class="cursor-pointer" v-on:click="sorting('category')">
                        Category
                        <SortUp v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="category"></SortUp>
                        <SortDown v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="category"></SortDown>
                    </span>
                </th>
                <th>
                    <span  class="cursor-pointer" v-on:click="sorting('address')">
                        Address
                        <SortUp v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="address"></SortUp>
                        <SortDown v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="address"></SortDown>
                    </span>
                </th>
                <td class="text-center">Activity</td>
                <td class="text-center">Notice</td>
                <th colspan="2">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <td class="text-center">{{ item.id }}</td>
                <td>
                    {{ item.date.date }}
                    <span class="text-muted ms-2">{{ item.date.time }}</span>
                </td>
                <td>{{ item.name }}</td>
                <td>
                    {{ item.category }}
                </td>
                <td>{{ item.address }}</td>
                <td class="text-center">
                    <i class="bi bi-check-square-fill text-secondary cursor-pointer"
                       v-if="item.is_active == 1" v-on:click="activityItem(item.id, 0)"></i>
                    <i class="bi bi-square text-secondary cursor-pointer"
                       v-if="item.is_active == 0" v-on:click="activityItem(item.id, 1)"></i>
                </td>
                <td class="text-center">

                    <TooltipSlot v-bind:info="item.notice"  v-if="item.notice !== null"></TooltipSlot>

                </td>
                <td><i class="bi bi-pencil-square text-success cursor-pointer"
                       data-bs-toggle="modal"
                       data-bs-target="#formModal"
                       v-on:click="editItem(item.id)"></i></td>
                <td><i class="bi bi-trash text-danger cursor-pointer"
                       v-on:click="deleteItem(item.id)"></i></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row">

        <div class="col-md-2">
            Items Count: <strong>{{ meta.total }}</strong>
        </div>

        <div class="col-md-8">
            <nav v-if="meta.total > items.length">
                <ul class="pagination float-end">
                    <li class="page-item" :class="{ active: link.active }" v-for="link in meta.links">
                        <a class="page-link" v-on:click="paginate" v-bind:href="link.url"><span v-html="link.label"></span></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="col-md-2 mb-3">
            <select class="form-select" v-on:change="perPage">
                <option value="10" selected>10</option>
                <option value="50" selected>50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
        </div>

    </div>

    <ModalSlot v-bind:categories="this.categories" v-bind:itemId="this.itemId"></ModalSlot>

</template>
<script>

import SortUp from './slots/SortUp.vue';
import SortDown from './slots/SortDown.vue';
import TooltipSlot from './slots/TooltipSlot.vue';
import ModalSlot from './slots/ModalSlot.vue';

export default {
    name:"Items",
    components: {
        SortUp,
        SortDown,
        TooltipSlot,
        ModalSlot,
    },
    // Variables
    data() {
        return {
            itemId: null,
            endpoint: '/api/items',
            per_page: null,
            page: null,
            sort_attr: 'created_at',
            sort_dir: 'desc',
            items: [],
            meta: [],
            categories: [],
            name: null,
            address: null,
            category: '',
            is_active: '',
        }
    },
    watch: {
        name: function(val) {
            this.name = val;
            this.clearCurrentPage();
            this.getItems();
        },
        category: function(val) {
            this.category = val;
            this.clearCurrentPage();
            this.getItems();
        },
        address: function(val) {
            this.address = val;
            this.clearCurrentPage();
            this.getItems();
        },
        is_active: function(val) {
            this.is_active = val;
            this.clearCurrentPage();
            this.getItems();
        },
    },
    created() {
        this.getItems();
        this.getCategoris();
    },
    mounted() {
        //
    },
    methods: {
        getCategoris() {
            //
            axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        },
        clearCurrentPage() {
            this.page = null;
        },
        getItems() {
            var url = this.endpoint + '?';

            if (this.page) {
                url = url + 'page=' + this.page + '&';
            }

            if (this.per_page) {
                url = url + 'per_page=' + this.per_page + '&';
            }

            // Filters
            url = url + 'sort_attr=' + this.sort_attr + '&';
            url = url + 'sort_dir=' + this.sort_dir + '&';

            if (this.name !== null) {
                url = url + 'name=' + this.name + '&';
            }

            if (this.category !== null) {
                url = url + 'category=' + this.category + '&';
            }

            if (this.address !== null) {
                url = url + 'address=' + this.address + '&';
            }

            if (this.is_active !== null) {
                url = url + 'is_active=' + this.is_active + '&';
            }

            //
            axios.get(url)
                .then(response => {
                    this.items = response.data.data;
                    this.meta = response.data.meta;
                })
                .catch(function (error) {
                    console.error(error);
                });
        },
        perPage(event) {
            event.preventDefault();
            this.per_page = event.currentTarget.value;
            this.page = null;
            this.getItems();
        },
        paginate(event) {
            event.preventDefault();
            var url = event.currentTarget.getAttribute('href');
            var parseUrl = new URL(url);
            var urlParams = new URLSearchParams(parseUrl.search);
            this.page = urlParams.get('page');
            this.getItems();
        },
        sorting(sort_attr) {
            this.sort_attr = sort_attr;

            if (this.sort_dir == 'desc') {
                this.sort_dir = 'asc';
            } else {
                this.sort_dir = 'desc';
            }

            this.getItems();
        },
        clearFilters(event) {
            this.page = null;
            this.name = null;
            this.address = null;
            this.category = '';
            this.is_active = '';
        },
        addItem() {
            this.itemId = null;
        },
        editItem(id) {
            this.itemId = id;
        },
        deleteItem(id) {
            if (confirm("Delete the item?")) {
                axios.delete('/api/items/' + id)
                    .then(response => {
                        this.getItems();
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            }
        },
        activityItem(id, value) {
            axios.post('/api/items/' + id + '/activity', {is_active: value})
                .then(response => {
                    this.getItems();
                })
                .catch(function (error) {
                    console.error(error);
                });
        },
    }
}
</script>