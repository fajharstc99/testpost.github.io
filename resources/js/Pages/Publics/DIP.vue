<script>
import PublicLayout from "@/Layouts/PublicLayout";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import Welcome from '@/Jetstream/Welcome.vue';
export default {
    created() {
        document.title = "Daftar Informasi Publik";
    },
    components:{
        PublicLayout,
        Link     
    },
    props:{
        datas:{
            type: Object,
        },
    },
}
</script>

<template>
    <PublicLayout title="Daftar Informasi Publik">


        <!-- Page Heading -->
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Daftar Informasi Publik
                </h2>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl shadow-blue-500/50 rounded-none">                   

                    <div class="flex items-start">
                        <div class="flex flex-col flex-wrap p-5 w-full">  
                            <p class="justify-between">Halaman ini adalah halaman Daftar Informasi Publik</p>
                            <p class="justify-between">
                            
                            </p>
                        </div>
                    </div>



                </div>
            </div>
        </div>

     
    </PublicLayout>
</template>