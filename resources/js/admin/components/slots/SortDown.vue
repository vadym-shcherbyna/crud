<template>
    <i class="bi bi-sort-down ms-1" v-if="sort_attr === current_attr & sort_dir === 'desc'"></i>
</template>
<script>
export default {
    name: 'SortDown',
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
