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
                                                    :href="route('admin.roles.index')"
                                                >
                                                    Roles
                                                </Link>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </nav>

                            <!-- breadcrumb header -->
                            <div class="text-3xl font-bold mt-2 mb-2">
                                 Data Role
                            </div>   

                        </div>

                        <div class="grid">
                            <div class="flex flex-row flex-wrap space-x-0 mb-2">
                                <div class="text-center mb-2 mt-5 lg:mb-0">
                                    <button @click="openModal()" class="btn btn-sm btn-success">Tambah</button>
                                </div>
                            </div>

                            <!--div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert" v-if="$page.flash.message">
                                <div class="flex">
                                    <div>
                                    <p class="text-sm">{{ $page.flash.message }}</p>
                                    </div>
                                </div>
                            </div-->


                            <table class="table-compact w-full">
                                <thead>
                                    <tr class="bg-gray-100 text-center">
                                        <th class="px-4 py-2 w-10">No.</th>
                                        <th class="px-4 py-2">Name</th>
                                        <th class="px-4 py-2">Guard Name</th>
                                        <th class="px-4 py-2 w-25">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(row, index) in data" :key="index">
                                        <td class="border px-4 py-2">{{ row.id }}</td>
                                        <td class="border px-4 py-2">{{ row.name }}</td>
                                        <td class="border px-4 py-2">{{ row.guard_name }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            <button @click="edit(row)" class="btn btn-square btn-warning h-6 w-6 btn-xs tooltip" data-tip="sunting">
                                                <center>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                    </svg>
                                                </center>
                                            </button>&nbsp;
                                            <button @click="deleteRow(row)" class="btn btn-outline btn-square btn-error h-6 w-6 btn-xs tooltip" data-tip="hapus">
                                                <center>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>  
                                                </center>                              
                                            </button>&nbsp;
                                            <button @click="roperRow(row)" class="btn btn-outline btn-square btn-info h-6 w-6 btn-xs tooltip" data-tip="hak akses">
                                                <center>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                                    </svg> 
                                                </center>                              
                                            </button>
                                            <!--Link :href="route('admin.roles.roper', row.id)" class="btn btn-outline btn-square btn-info h-6 w-6 btn-xs tooltip" data-tip="hak akses">
                                                <center>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                                    </svg> 
                                                </center>
                                            </Link-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    
                                    <div class="fixed inset-0 transition-opacity">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                                
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                        <form>
                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <div>
                                                    <div class="mb-4">
                                                        <label for="idInputName" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="idInputName" placeholder="Enter Name" v-model="form.name">
                                                        <!--div v-if="$page.errors.name" class="text-red-500">{{ $page.errors.name[0] }}</div-->
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="idInputGuard" class="block text-gray-700 text-sm font-bold mb-2">Guard Name</label>
                                                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="idInputGuard" placeholder="Enter Guard Name" v-model="form.guard_name">
                                                        <!--div v-if="$page.errors.guard_name" class="text-red-500">{{ $page.errors.guard_name[0] }}</div-->
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                                    <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="!editMode" @click="save(form)">
                                                        Simpan
                                                    </button>
                                                </span>
                                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                                    <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="editMode" @click="update(form)">
                                                        Ubah
                                                    </button>
                                                </span>
                                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">                                                
                                                    <button @click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                        Batal
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    
                                    </div>
                                </div>
                            </div>        

                            
                            <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen2">
                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    
                                    <div class="fixed inset-0 transition-opacity">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                                
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div>
                                                <table class="table-compact w-full">
                                                    <thead>
                                                        <tr class="bg-gray-100 text-center">
                                                            <th class="px-4 py-2 w-10">ID</th>
                                                            <th class="px-4 py-2">Hak Akses</th>
                                                            <th class="px-4 py-2">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="row2 in data2">
                                                            <td class="border px-4 py-2">{{ row2.id }}</td>
                                                            <td class="border px-4 py-2">{{ row2.name }}</td>
                                                            <td class="border px-4 py-2 text-center">
                                                                <form>
                                                                    <input type="text" class="w-10 h-4 " v-model="form.id" /><!-- sementara belum di hidden -->&nbsp;
                                                                    <input type="checkbox" @change="handleChange()" class="checkbox" />
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">                                                
                                                <button @click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                    Tutup
                                                </button>
                                            </span>
                                        </div>                               
                                    </div>
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
    import AdminLayout from "@/Layouts/AdminLayout";
    import { useForm } from "@inertiajs/inertia-vue3";
    import { Link, Head } from "@inertiajs/inertia-vue3";
    import { Inertia } from "@inertiajs/inertia";

    export default {
        created () {
            document.title = "Roles";
        },
        components: {
            Link,
            Head,       
            AdminLayout
        },
        props: ['data', 'data2',  'data3','errors'],
        data() {
            return {
                editMode: false,
                isOpen: false,
                isOpen2: false,
                form: {
                    name: null,
                    guard_name: null,
                },
                form3: {
                    permission_id: null,
                    role_id: null,
                },
            }
        },
        methods: {
            openModal() {
                this.isOpen = true;
            },
            closeModal() {
                this.isOpen = false;
                this.isOpen2 = false;
                this.reset();
                this.editMode=false;
            },
            reset() {
                this.form = {
                    name: null,
                    guard_name: null,
                }
            },
            save(data) {
                this.$inertia.post('/admin/roles', data)
                this.reset();
                this.closeModal();
                this.editMode = false;
            },
            edit(data) {
                this.form = Object.assign({}, data);
                this.editMode = true;
                this.openModal();
            },
            update(data) {
                data._method = 'PATCH';
                this.$inertia.post('/admin/roles/edit/' + data.id, data)
                this.reset();
                this.closeModal();
            },
            deleteRow(data) {
                if (!confirm('Yakin ingin menghapus data ini ?')) return;
                data._method = 'DELETE';
                this.$inertia.post('/admin/roles/delete/' + data.id, data)
                this.reset();
                this.closeModal();
            },
            openModal2() {
                this.isOpen2 = true;
            },
            roperRow(data) {
                 this.form = Object.assign({}, data);
                 this.openModal2();                
                // data._method = 'GET';
                // this.$inertia.get('/admin/roles/roper/' + id);      
                //Inertia.get(route("admin.roles.roper", id));        
            },    
        },
    }
</script>