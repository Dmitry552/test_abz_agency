<script setup lang="ts">
import {useStore} from "@/store";
import {useRouter} from "vue-router";
import {computed, ref} from "vue";
import type {Position} from "@/types";
import swal from "sweetalert";
import UploadFile from "@/components/UploadFile.vue";
import useImageOptimization from "@/composables/useImageOptimization";
import {deleteToken} from "@/store/Token/mutations";
import UserAvatar from "@/components/UserAvatar.vue";
import MySelect from "@/components/ui/MySelect.vue";
import MyInput from "@/components/ui/MyInput.vue";

const store = useStore();
const router = useRouter();

const file = ref<File | null>(null);
const fileUrl = ref<string>();
const name = ref<string>();
const email = ref<string>();
const phone = ref<string>();
const position_id = ref<number>();
const errorResponse = ref();

const {optimization} = useImageOptimization();

const showDropZone = ref<boolean>(true);

const getToken = () => store.dispatch('getToken');
const getPosition = () => store.dispatch('getPositions');
const createUsers = (data: FormData) => store.dispatch('createUsers', data);



const positions = computed<Position[]>(() => store.getters.getUserPositions);

try {
    await getToken();
} catch (err) {
    router.push({name: 'home'});
}

try {
    await getPosition();
} catch (err: any) {
    console.warn(err.message);
    swal({
        title: 'Ops!',
        text: err.message,
        icon: "error",
    });
}

async function handleAddedFile(data: File) {
    const result = await optimization(data);
    file.value = result.file as File;
    fileUrl.value = result.fileUrl;
    showDropZone.value = false;
}

function handleDeleteImage() {
    showDropZone.value = true;
}

async function handleSubmit() {
    const data = new FormData();
    data.append('name', name.value!);
    data.append('email', email.value!);
    data.append('phone', phone.value!);
    data.append('position_id', position_id.value);
    data.append('photo', file.value!);

    try {
        const result = await createUsers(data);
        swal({
            title: 'Ok!',
            text: result.message,
            icon: "success",
        }).then(() => {
            deleteToken();
            router.push({name: 'home'});
        });
    } catch (err: any) {
        if (err.status === 422) {
            errorResponse.value = err.fails;
        } else {
            swal({
                title: 'Ops!',
                text: err.message,
                icon: "error",
            });
        }
    }
}
</script>

<template>
    <div class="w-full flex items-center justify-center p-4 mt-16 sm:mt-16">
        <div class="mx-auto w-full  max-w-[550px] bg-white">
            <form>
                <UploadFile
                    v-show="showDropZone"
                    @addedFile="handleAddedFile"
                    :error="errorResponse?.photo[0]"
                />
                <UserAvatar
                    :image="fileUrl!"
                    :showDropZone="showDropZone"
                    :error="errorResponse?.photo[0]"
                    @deleteImage="handleDeleteImage"
                />
                <my-input
                    v-model="name"
                    title="Name"
                    name="name"
                    placeholder="Full Name"
                    :error="errorResponse?.name"
                />
                <my-select
                    v-model="position_id"
                    :positions="positions"
                    :error="errorResponse?.position_id"
                />
                <my-input
                    v-model="phone"
                    title="Phone Number"
                    name="phone"
                    placeholder="Enter your phone number"
                    :error="errorResponse?.phone"
                />
                <my-input
                    v-model="email"
                    type="email"
                    title="Email Address"
                    name="email"
                    placeholder="Enter your email"
                    :error="errorResponse?.email"
                />
                <div>
                    <button
                        @click.prevent="handleSubmit"
                        class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base
                            font-semibold text-white outline-none mt-4">
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>
