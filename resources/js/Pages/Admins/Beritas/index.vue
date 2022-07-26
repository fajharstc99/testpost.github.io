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
                                </ol>
                            </nav>

                            <!-- breadcrumb header -->
                            <div class="text-3xl font-bold mt-2 mb-2">
                                 Data Berita
                            </div>   

                        </div>

                        <div class="grid">

                            <div class="flex flex-row flex-wrap space-x-0 lg:space-x-2 mb-2">
                                <div class="w-full lg:w-64 mb-2 mt-5 lg:mb-0">
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <div class="text-gray-500 sm:text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                            </div>
                                        </div>
                            
                                        <input type="text" 
                                            class="
                                                focus:ring-indigo-500
                                                focus:border-indigo-500
                                                block w-full pl-7 pr-12
                                                shadow-sm
                                                sm:text-sm
                                                border-gray-300 rounded-md
                                            "
                                            placeholder="cari"
                                            v-model="form.search"
                                        />

                                        <div class="absolute inset-y-0 right-0 flex items-center">
                                            <select class="
                                                focus:ring-indigo-500
                                                focus:border-indigo-500
                                                h-full py-0 pl-2 pr-7 border-transparent
                                                bg-transparent
                                                text-gray-500
                                                sm: text-sm rounded-md 
                                            "
                                            v-model="form.per_page"
                                            >
                                                <option>50</option>
                                                <option>100</option>
                                                <option>500</option>
                                                <option>1000</option>
                                            </select>
                                        </div>
                                    </div>                
                                </div>

                                <div class="w-full lg:w-auto text-center mb-2 mt-5 lg:mb-0">
                                    <Link 
                                        :href="route('admin.beritas.create')"
                                        class="btn btn-sm btn-success"
                                    >
                                        Tambah
                                    </Link>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="table table-compact w-full">
                                    <!-- head -->
                                    <thead>
                                        <tr class="bg-gray-100 text-center">
                                            <th class="px-4 py-2 w-10">No</th>
                                            <th class="px-4 py-2">Judul</th>
                                            <th class="px-4 py-2">Status</th>
                                            <th class="px-4 py-2 w-25">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- row 1 -->
                                    <tr v-for="(berita, index) in beritas.data" :key="index">
                                        <th class="border px-4 py-2 w-10">{{ berita.id }}</th>
                                        <td class="border px-4 py-2">{{ berita.judul }}</td>
                                        <td class="border px-4 py-2">{{ berita.status == 0 ? "posting" : "pending" }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            <Link :href="route('admin.beritas.edit', berita.id)" class="btn btn-outline btn-square btn-warning h-6 w-6 btn-xs tooltip" data-tip="sunting">
                                                <center>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                    </svg>
                                                </center>
                                            </Link>&nbsp;
                                            <Link @click="destroy(berita.id)" class="btn btn-outline btn-square btn-error h-6 w-6 btn-xs tooltip" data-tip="hapus">
                                                <center>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </center>
                                            </Link>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="bg-white px-3 py-1 flex items-center justify-between border-t border-gray-200 sm-px-3">

                                <div class="flex-1 flex justify-between sm:hidden">
                                    <button class="btn-pagination" :disabled="beritas.current_page <= 1"
                                        @click.prevent="paginate(beritas.current_page -1 )">
                                            Previous                    
                                    </button>

                                    <button class="btn-pagination" :disabled="beritas.current_page >= beritas.last_page"
                                        @click.prevent="paginate(beritas.current_page + 1)">
                                            Next                    
                                    </button>
                                </div>

                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between mb-5">
                                    <div>
                                        <p class="text-sm leading-5 text-gray-700">
                                            Menampilkan
                                            <span class="font-medium">
                                                {{ beritas.from }}
                                            </span>
                                            sampai
                                            <span class="font-medium">
                                                {{ beritas.to }}
                                            </span>
                                            dari
                                            <span class="font-medium">
                                                {{ beritas.total }}
                                            </span>
                                            hasil
                                        </p>
                                    </div>

                                    <pagination
                                        :current_page="current_page"
                                        :total="beritas.total"
                                        :per_page="beritas.per_page"
                                        :last_page="beritas.last_page"
                                        :from="beritas.from"  
                                        :to="beritas.to" 
                                        @paginate="paginate"
                                        :offset="4"  
                                    > 
                                    </pagination>
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
    import Pagination from "@/Components/Pagination.vue";

    export default {
        created () {
            document.title = "Berita";
        },
        components: {
            Link,
            Head,            
            Pagination,
            AdminLayout
        },
    
        props:{
            beritas:{
                type: Object,
                default: () => ({}),
            },
            filters:{
                type: Object,
                default: () => ({}),
            },
        },
        data() {
            return{
                current_page: this.beritas.current_page,
                form: {
                    search: this.filters.search,
                    per_page: this.beritas.per_page,
                    page: this.filters.page,
                    sort_by: this.filters.sort_by,
                    sort_dir: this.filters.sort_dir ?? "asc",
                }
            }
        },
        watch: {
            form:{
                handler: _.throttle(function (){
                    let query = _.pickBy(this.form);
                    this.$inertia.get(
                        this.route("admin.beritas.index"),
                        Object.keys(query).length ? query : { remember: "forget" },
                        { preserveState: true }
                    );
                }, 300),
                deep: true,
            },
            beritas(beritas){
                this.current_page = beritas.current_page;
            }
        },
        methods: {
            reset() {
                this.form = _.mapValues(this.form, () => null);
            },
            paginate(page) {
                this.form.page = page;
            },
            destroy(id) {
                if (confirm("Yakin menghapus data ?")) {
                    Inertia.delete(route("admin.beritas.destroy", id));
                }
            }
        }
    }
</script>