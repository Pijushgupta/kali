<!-- we can't render all icons at once due to performance issue  -->
<script setup>
import { icons } from '@tabler/icons-vue';
import { ref, watch } from 'vue';

const props = defineProps({ 
    isOpen: Boolean,
    selectedIcon:String
})
const perPage = 48;
const iconKeys = Object.keys(icons);
const totalIcons = iconKeys.length;
const totalPages = Math.ceil(totalIcons / perPage);

const currentPage = ref(1);

const start = ref(perPage * (currentPage.value - 1));
const end = ref(perPage);

const calculateScope = () => {
    start.value = perPage * (currentPage.value - 1);
    end.value = start.value + perPage;
}

watch(() => currentPage.value, (value) => {
    calculateScope();
});
const currentPageIncrement = () => {
    if (currentPage.value == totalPages) return false;
    currentPage.value++;
}
const currentPageDecrement = () => {
    if (currentPage.value == 1) return false;
    currentPage.value--;
}

const emit = defineEmits(['update:selectedIcon', 'update:isOpen']);
const selectIcon = (index) => {
    //selecting the icons
    emit('update:selectedIcon', index);
    //closing the modal
    updateOpenState();
}
const updateOpenState = () => {
    emit('update:isOpen', false); //closing open modal
}
</script>
<template>
<div class="absolute inset-0 flex justify-center items-center h-screen z-10   ">
    <div class="md:-mt-40  p-2  border shadow rounded-lg backdrop-blur flex flex-col justify-between ">
        <div
            class="grid gap-2 grid-cols-5 md:grid-cols-8 overflow-y-auto h-80 backdrop-blur bg-white dark:bg-gray-700 bg-opacity-20 dark:bg-opacity-30 border rounded-lg p-2 ">
            <div v-for="(icon, index) in iconKeys.slice(start, end)" :key="index" class="flex justify-center">
                <span @click="selectIcon(icon)"
                    class="border dark:border-gray-800  rounded-lg bg-white dark:bg-gray-700 cursor-pointer">
                    <component :is="icons[icon]" class="m-2 " />
                </span>
            </div>
        </div>
        <!-- pagination -->
        <div class="flex flex-row mt-2 justify-between items-center ">
            <div class="flex flex-row items-center">
                <div class="rounded border p-2  mr-2 flex justify-center items-center cursor-pointer dark:bg-gray-700"
                    @click="currentPageDecrement">
                    <icons.IconChevronLeft class="size-4" />
                </div>
                <select v-model="currentPage"
                    class="mr-2 py-1 rounded border-gray-200 dark:border-gray-700  cursor-pointer dark:bg-gray-700">
                    <option v-for="(page, i) in totalPages" :key="i">{{ page }}</option>
                </select>
                <div class="rounded border p-2 flex justify-center items-center cursor-pointer dark:bg-gray-700"
                    @click="currentPageIncrement">
                    <icons.IconChevronRight class="size-4" />
                </div>
            </div>
            <div class="flex flex-row items-center">
                <button @click="updateOpenState"
                    class="text-sm font-semibold  p-2    inline w-16 ml-auto ">Close</button>

            </div>
        </div>
    </div>
</div>
    <!-- pagination ends -->

</template>