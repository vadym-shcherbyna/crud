<template>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2"><i class="bi bi-telephone me-3"></i> Items</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#formModal">
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
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <option value="3">Category 3</option>
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
                <th class="">
                    <span  class="cursor-pointer" v-on:click="sorting('name')">
                        Name
                        <SortUp v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="name"></SortUp>
                        <SortDown v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="name"></SortDown>
                    </span>
                </th>
                <th class="">
                    <span  class="cursor-pointer" v-on:click="sorting('category')">
                        Category
                        <SortUp v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="category"></SortUp>
                        <SortDown v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="category"></SortDown>
                    </span>
                </th>
                <th class="">
                    <span  class="cursor-pointer" v-on:click="sorting('address')">
                        Address
                        <SortUp v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="address"></SortUp>
                        <SortDown v-bind:sort_attr="sort_attr" v-bind:sort_dir="sort_dir" current_attr="address"></SortDown>
                    </span>
                </th>
                <th class="text-center">Active</th>
                <th class="text-center">Notice</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <td class="text-center">{{ item.id }}</td>
                <td>
                    {{ item.date.date }}
                    <span class="text-muted ms-2">{{ item.date.time }}</span>
                </td>
                <td class="">{{ item.name }}</td>
                <td class="">
                    {{ item.category }}
                </td>
                <td>{{ item.address }}</td>
                <td class="text-center">
                    <i class="bi bi-check-square-fill text-secondary" v-if="item.is_active == 1"></i>
                    <i class="bi bi-square text-secondary" v-if="item.is_active == 0"></i>
                </td>
                <td class="text-center">

                    <TooltipSlot v-bind:info="item.notice"  v-if="item.notice !== null"></TooltipSlot>

                </td>
                <td></td>
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

    <ModalSlot></ModalSlot>

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
            endpoint: '/api/items',
            per_page: null,
            page: null,
            sort_attr: 'created_at',
            sort_dir: 'desc',
            items: [],
            meta: [],
            name: null,
            address: null,
            category: '',
            is_active: '',
        }
    },
    watch: {
        name: function(val) {
            this.name = val;
            this.page = null;
            this.getItems();
        },
        category: function(val) {
            this.category = val;
            this.page = null;
            this.getItems();
        },
        address: function(val) {
            this.address = val;
            this.page = null;
            this.getItems();
        },
        is_active: function(val) {
            this.is_active = val;
            this.page = null;
            this.getItems();
        },
    },
    created() {
        this.getItems();
    },
    mounted() {
        //
    },
    methods: {
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
    }
}
</script>