<template>
    <i class="bi bi-sort-up ms-1" v-if="sort_attr === current_attr & sort_dir === 'asc'"></i>
</template>
<script>
export default {
    name: 'SortUp',
    props: [
        'sort_attr',
        'current_attr',
        'sort_dir',
    ],
    data: function () {
        return {}
    },
    mounted () {
        //
    },
};
</script>
