<script>
import PublicLayout from "@/Layouts/PublicLayout";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
export default {
    created() {
        document.title = "Berita";
    },
    components:{
        PublicLayout,
        Link     
    },
    props: ['data'],
    methods: {
        showImage() {
            return "/storage/";
        },
        getPostBody (row) {
            let isi = this.stripTags(row.isi);

            return isi.length > 200 ? isi.substring(0, 200) + '.....' : isi;           
        },

        stripTags (text) {
            return text.replace(/(<([^>]+)>)/ig, '');
        }
    },
}
</script>

<template>
    <PublicLayout title="Artikel">


        <!-- Page Heading -->
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Daftar Berita
                </h2>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl shadow-blue-500/50 rounded-none">                   

                    <!-- Container for demo purpose -->
                    <div class="container my-24 px-6 mx-auto">

                        <!-- Section: Design Block -->
                        <section class="mb-32 text-gray-800 text-center md:text-left">

                            <div v-for="row in data" class="flex flex-wrap mb-6">
                                <div class="grow-0 shrink-0 basis-auto w-full md:w-3/12 px-3 mb-6 md:mb-0 ml-auto">
                                    <div
                                        class="relative overflow-hidden bg-no-repeat bg-cover relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg mb-6"
                                        data-mdb-ripple="true" data-mdb-ripple-color="light">
                                        <img :src="showImage() + row.path"
                                            class="w-full h-48" alt="" />
                                        <a>
                                            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                                            style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div>
                                </div>

                                <div class="grow-0 shrink-0 basis-auto w-full md:w-9/12 xl:w-7/12 px-3 mb-6 md:mb-0 mr-auto">
                                    <h5 class="text-lg font-bold text-justify"><Link :href="route('berita.detail', row.slug)">{{ row.judul }}</Link></h5>
                                    <p class="text-gray-500 mb-3">
                                        <small>{{ row.updated_at }}</small>
                                    </p>
                                    <p class="text-gray-500 text-justify">
                                        {{ getPostBody(row) }}<Link :href="route('berita.detail', row.slug)" class="text-blue-700 hover:text-blue-500"> selengkapnya</Link>
                                    </p>
                                </div>
                            </div>

                        </section>
                        <!-- Section: Design Block -->

                    </div>
                    <!-- Container for demo purpose -->  


                </div>
            </div>
        </div>

     
    </PublicLayout>
</template>