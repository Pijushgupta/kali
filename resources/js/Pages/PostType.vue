<script setup>
import {ref} from 'vue';

const props = defineProps({
    post_types: Object 
});

const post_type = ref(props.post_types);
</script>
<template>
    <div class="absolute inset-0" v-if="post_type.length === 0 ">
        <div class="bg-gray-500">
            Hello
        </div>
    </div>
</template>