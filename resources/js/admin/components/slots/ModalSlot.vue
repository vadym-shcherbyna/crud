<template>
    <div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0">{{ title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ref="formModalClose"></button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger" v-for="error in errors">
                        <i class="bi bi-exclamation-triangle me-2"></i> {{ error[0] }}
                    </div>

                    <form id="FormModalForm">

                        <div class="mb-3">
                            <label for="formModalName" class="form-label">Name <Required></Required></label>
                            <input type="text" class="form-control" id="formModalName" v-model="formModalName">
                        </div>

                        <div class="mb-3">
                            <label for="formModalSlug" class="form-label">Slug <Required></Required></label>
                            <input type="text" class="form-control" id="formModalSlug" v-model="formModalSlug">
                        </div>

                        <div class="mb-3">
                            <label for="formModalCategory" class="form-label">Category</label>
                            <select id="formModalCategory" class="form-select" v-model="formModalCategory">
                                <option v-for="(item, index) in categories" v-bind:value="index">{{ item }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="formModalAddress" class="form-label">Address <Required></Required></label>
                            <input type="text" class="form-control" id="formModalAddress" v-model="formModalAddress">
                        </div>

                        <div class="mb-3">
                            <label for="formModalDescription" class="form-label">Description <Required></Required></label>
                            <textarea class="form-control" id="formModalDescription" rows="3" v-model="formModalDescription"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="formModalNotice" class="form-label">Notice</label>
                            <input type="text" class="form-control" id="formModalNotice" v-model="formModalNotice">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="formModalIsActive" v-model="formModalIsActive">
                            <label class="form-check-label cursor-pointer" for="formModalIsActive">Is Active</label>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm  btn-success" v-on:click="saveItem">{{ title }}</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

function initialState() {
    return {
        errors: {},
        formModalName: '',
        formModalSlug: '',
        formModalCategory: 1,
        formModalAddress: null,
        formModalDescription: null,
        formModalNotice: null,
        formModalIsActive: true,
    }
}

import Required from './Required.vue';

export default {
    name: 'ModalSlot',
    components: {
        Required,
    },
    props: [
        'categories',
        'itemId',
    ],
    data: function () {
        return initialState();
    },
    watch: {
        formModalName: function(val) {
            if (this.itemId === null) {
                this.formModalSlug = this.stringToSlug(this.formModalName);
            }
        },
        itemId: function(val) {
            this.switchForm(val);
        },
    },
    created() {
        this.switchForm(this.itemId);
    },
    mounted () {
        //
    },
    methods: {
        switchForm(id) {
            // Reset Data
            Object.assign(this.$data, initialState());

            //
            if (id === null) {
                this.title = 'Add a item';
            } else {
                this.title = 'Edit the item';

                //
                axios.get('/api/items/' + id + '/edit')
                    .then(response => {
                        var item = response.data;

                        this.formModalName = item.name;
                        this.formModalSlug = item.slug;
                        this.formModalCategory = item.category;
                        this.formModalAddress = item.address;
                        this.formModalDescription = item.description;
                        this.formModalNotice = item.notice;
                        this.formModalIsActive = item.is_active ? true : false;
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            }
        },
        saveItem() {
            if (this.itemId === null) {
                this.storeItem();
            } else {
                this.updateItem();
            }
        },
        storeItem() {
            axios.post('/api/items', this.getFormData()).then((response) => {
                this.updateItems();

                // Reset Data
                Object.assign(this.$data, initialState());
            })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
        updateItem() {
            axios.put('/api/items/' + this.itemId, this.getFormData()).then((response) => {
                this.updateItems();
            })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
        getFormData() {
           return {
               name: this.formModalName,
               slug: this.formModalSlug,
               category: this.formModalCategory,
               address: this.formModalAddress,
               description: this.formModalDescription,
               notice: this.formModalNotice,
               is_active: this.formModalIsActive,
           }
        },
        updateItems() {
            // Call Parent Method
            this.$parent.getItems();

            // Close Modal
            this.$refs.formModalClose.click();
        },
        stringToSlug(str) {
            //
            str = str.replace(/^\s+|\s+$/g, ""); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "åàáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaaaeeeeiiiioooouuuunc------";

            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
            }

            str = str
                .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
                .replace(/\s+/g, "-") // collapse whitespace and replace by -
                .replace(/-+/g, "-") // collapse dashes
                .replace(/^-+/, "") // trim - from start of text
                .replace(/-+$/, ""); // trim - from end of text

            return str;
        },
    },
};
</script>
