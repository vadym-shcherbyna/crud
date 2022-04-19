<template>
    <Popper placement="left" hover>
        <i class="bi bi-chat-fill cursor-help"></i>
        <template #content>
            <div class="vue3-popper-tooltip">
                <i class="bi bi-info-circle mx-2 text-info"></i>
                {{ info }}
            </div>
        </template>
    </Popper>
</template>
<script>

import Popper from "vue3-popper";

export default {
    name: 'TooltipSlot',
    components: {
        Popper,
    },
    props: [
        'info',
    ],
    data: function () {
        return {}
    },
    mounted () {
        //
    },
};
</script>
