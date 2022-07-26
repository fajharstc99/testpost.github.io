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
    props: {
        data: Object
    },
    methods: {
        showImage() {
            return "/storage/";
        }
    },
}
</script>

<template>
    <PublicLayout title="Artikel">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl shadow-blue-500/50 rounded-none">                   

                    <div class="container my-24 px-6 mx-auto">

                        <section class="mb-32 text-gray-800">
                            <div class="lg:w-8/12 xl:w-6/12 mx-auto d-block">
                                <img :src="showImage() + data.path" class="w-full mb-6" alt="" />
                            </div>
                            <div class="flex items-center mb-6">
                                <div>
                                    <span>{{ data.updated_at }}</span>
                                </div>
                            </div>

                            <h1 class="font-bold text-3xl mb-6 text-justify">{{ data.judul }}</h1>
                            <p class="text-justify" v-html="data.isi"></p>
                        </section>

                    </div>


                </div>
            </div>
        </div>

     
    </PublicLayout>
</template>