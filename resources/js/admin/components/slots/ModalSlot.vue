<template>
    <div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0">New Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="formModalName" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="formModalName">
                        </div>
                        <div class="mb-3">
                            <label for="formModalSlug" class="form-label">Item Slug</label>
                            <input type="text" class="form-control" id="formModalSlug">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm  btn-success">Add a item</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'ModalSlot',
    components: {},
    props: [],
    data: function () {
        return {}
    },
    mounted () {
        //
    },
};
</script>
