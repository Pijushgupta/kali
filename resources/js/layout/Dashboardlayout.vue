<script setup>
import Navbar from '../sharead/Navbar.vue';
import Sidebar from '../sharead/Sidebar.vue';
</script>
<template>
    <Navbar/>
    <div class="flex flex-row">
        <div class="md:px-5  md:w-[300px] h-full  sidebar overflow-y-scroll">
            <Sidebar/>
        </div>
        <div class="px-5  w-full h-full  pt-20 relative">
            <slot/>
        </div>
    </div>
</template>