<script setup lang="ts">
import Card from '@/components/Card.vue'
import swal from "sweetalert";
import {useStore} from "@/store";
import {computed, ref, watch} from "vue";
import {useRoute, useRouter} from "vue-router";
import PaginationButtons from "@/components/PaginationButtons.vue";
import {IGetUsers, TGetUsersByPageData} from "@/store/User/types";

const store = useStore();
const router = useRouter();
const route = useRoute();

/** Disable button */
const disabledPrevious = ref<boolean>(false);
const disabledMore = ref<boolean>(false);
const disabledNext = ref<boolean>(false);

/** Data pagination */
const currentPage = ref<number>(1);
const totalPage = ref<number | null>(null);
const count = ref<number>(5);

const getUsers = () => store.dispatch('getUsers');
const getUsersByPage = (data: TGetUsersByPageData) => store.dispatch('getUsersByPage', data)

const users = computed(() => store.getters.getUsers);

if (route.query.page || route.query.count) {
    const data = {} as TGetUsersByPageData;

    data.page = route.query.page ? Number(route.query.page) : currentPage.value;
    data.count = route.query.count ? Number(route.query.count) : count.value;
    data.key = 'rewrite';

    await loadUsersByPage(data);
} else {
    await loadUsers();
}

function handleSelectedUser(id: number) {
    router.push(`/user/${id}`);
}

async function handlePrevious() {
    const data = {} as TGetUsersByPageData;

    data.page = currentPage.value - 1;
    data.count = 5;
    data.key = 'rewrite';

    await loadUsersByPage(data);
}

async function handleMore() {
    const data = {} as TGetUsersByPageData;

    data.page = currentPage.value + 1;
    data.count = 5;
    data.key = 'add';

    await loadUsersByPage(data);
}

async function handleNext() {
    const data = {} as TGetUsersByPageData;

    data.page = currentPage.value + 1;
    data.count = 5;
    data.key = 'rewrite';

    await loadUsersByPage(data);
}

function updateDataPaginate(data: IGetUsers) {
    currentPage.value = data.page;
    totalPage.value = data.total_pages;
}

async function loadUsers() {
    try{
        const data: IGetUsers = await getUsers();
        updateDataPaginate(data);
    } catch (err) {
        console.warn(err.message);
        swal({
            title: 'Ops!',
            text: err.message,
            icon: "error",
        });
    }
}

async function loadUsersByPage(data: TGetUsersByPageData) {
    try {
        const response: IGetUsers = await getUsersByPage(data);
        updateDataPaginate(response);
    } catch (err) {
        console.warn(err.message);
        swal({
            title: 'Ops!',
            text: err.message,
            icon: "warning",
        });
    }
}

watch(currentPage, () => {
    if (currentPage.value >= totalPage.value!) {
        disabledNext.value = true;
        disabledMore.value = true;
    } else {
        disabledNext.value = false;
        disabledMore.value = false;
    }

    currentPage.value <= 1 ? disabledPrevious.value = true : disabledPrevious.value = false;
},{ immediate: true });
</script>

<template>
    <div class="flex flex-col items-center gap-2 mt-20">
        <Card
            @selectedUser="handleSelectedUser"
            v-for="user in users"
            :key="user.id"
            :user="user"
        />
        <PaginationButtons
            :disabledPrevious="disabledPrevious"
            :disabledMore="disabledMore"
            :disabledNext="disabledNext"
            @previous="handlePrevious"
            @more="handleMore"
            @next="handleNext"
        />
    </div>
</template>

<style scoped>

</style>
