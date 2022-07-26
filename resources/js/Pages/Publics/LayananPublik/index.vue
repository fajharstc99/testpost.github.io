<script>
import PublicLayout from "@/Layouts/PublicLayout";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import Welcome from '@/Jetstream/Welcome.vue';
export default {
    created() {
        document.title = "Layanan Publik";
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
    <PublicLayout title="Layanan Publik">


        <!-- Page Heading -->
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Layanan Publik
                </h2>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl shadow-blue-500/50 rounded-none">                   

                    <div class="flex items-start">
                        <ul class="flex flex-col flex-wrap menu bg-primary text-secondary-content p-2 lg:w-36">
                            <li>
                                <Link
                                    :href="route('layanan-publik.lp1')">Form Permohonan Informasi Publik
                                </Link> 
                            </li><hr />

                            <li>
                                <Link 
                                    :href="route('layanan-publik.lp2')">Form Penyampaian Keberatan
                                </Link> 
                            </li><hr />

                            <li>
                                <Link
                                    :href="route('layanan-publik.lp3')">Form Survey Layanan Informasi Publik
                                </Link>                        
                            </li><hr />

                            <li>
                                <Link
                                    :href="route('layanan-publik.lp4')">Form Survey Kepuasan Masyarakat
                                </Link>                        
                            </li><hr />
                        </ul>
                        <div class="px-5 py-5">
                            
                            <h2>{{datas}}</h2>
                            <p class="justify-between">Halaman ini adalah halaman {{datas}}</p>
                            <p class="justify-between">

                            </p>
                        </div>
                    </div>



                </div>
            </div>
        </div>

     
    </PublicLayout>
</template>