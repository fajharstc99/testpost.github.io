<template>
    <admin-layout>        
        <div class="max-w-7xl m-auto mt-10">
            <div class="overflow-x-auto m-5">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white">

                        <!-- breadcrumb items -->
                        <div>
                            <nav class="flex" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                    <li class="inline-flex items-center">
                                        <Link 
                                            :href="route('admin.homes.index')"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                        </Link>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <div class="text-gray-700 ml-1 md:ml-2 text-sm font-medium">
                                                <Link 
                                                    :href="route('admin.beritas.index')"
                                                >
                                                    Berita
                                                </Link>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <div class="text-gray-700 ml-1 md:ml-2 text-sm font-medium">
                                                <Link 
                                                    :href="route('admin.beritas.create')"
                                                >
                                                    Tambah
                                                </Link>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </nav>

                            <!-- breadcrumb header -->
                            <div class="text-3xl font-bold mt-2 mb-2">
                                Tambah Data Berita
                            </div>   

                        </div>      

                        <div class="grid">
                            <form @submit.prevent="storeData">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                                        <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            v-model="form.judul"
                                            autofocus
                                        />
                                        <jet-input-error :message="form.errors.judul" class="mt-2" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="path" class="block text-sm font-medium text-gray-700">Foto</label>
                                        <input type="file" @input="form.path = $event.target.files[0]" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <jet-input-error :message="form.errors.path" class="mt-2" />
                                    </div>
                                    
                                    <div class="col-span-12 sm:col-span-6">
                                        <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
                                        <input id="isi" type="hidden" name="isi" 
                                            v-model="form.isi">
                                        <trix-editor input="isi"></trix-editor>
                                        <jet-input-error :message="form.errors.isi" class="mt-2" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                        <select class="mt-1 form-select form-select-lg focus:ring-indigo-500 focus:border-indigo-500 cursor-pointer block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            v-model="form.status">
                                                <option value=0>Posting</option>
                                                <option value=1>Pending</option>
                                        </select>
                                        <jet-input-error :message="form.errors.status" class="mt-2" />
                                    </div>
                                </div>

                                <div class="px-4 py-3 50 text-right sm:px-6">
                                    <button class="btn btn-sm btn-info"
                                        :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing"
                                    >
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </admin-layout>
</template>

<script>
import JetButton from '@/JetStream/Button.vue';
import JetInput from '@/JetStream/Input.vue';
import JetInputError from '@/JetStream/InputError.vue';
import JetLabel from '@/JetStream/Label.vue'; 
import JetActiconMessage from '@/JetStream/ActionMessage.vue';
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/AdminLayout';

export default {
    created () {
        document.title = "Tambah Berita";
    },
    components: {
        JetButton,
        JetInput,
        JetInputError,
        JetLabel,
        JetActiconMessage,
        Link,
        AdminLayout
    },
    data() {
        return {
            form: this.$inertia.form({
                judul: "",
                isi: "",
                status: "",
                path: "",
            }),
        }
    },
    methods: {
        storeData(){
            this.form.post(this.route('admin.beritas.store'), {
                errorBag: 'storeData',
                preserveScroll: true,
            })
        },
        setTextToTrix: function() {
            this.form.isi = document.getElementById("isi").value; 
        }
    },
    mounted() {
        document.addEventListener("trix-change", this.setTextToTrix); 
    }
}

document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
})
</script>