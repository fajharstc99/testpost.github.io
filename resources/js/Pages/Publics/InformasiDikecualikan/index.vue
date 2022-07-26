<script>
import PublicLayout from "@/Layouts/PublicLayout";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import Welcome from '@/Jetstream/Welcome.vue';
export default {
    created() {
        document.title = "Informasi Dikecualikan";
    },
    components:{
        PublicLayout,
        Link     
    },
    props:{
        title:{
            type: Object,
        },
        data:{
            type: Object,
            default: () => ({}),
        },
    },
}
</script>

<template>
    <PublicLayout title="Informasi Dikecualikan">


        <!-- Page Heading -->
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Informasi Dikecualikan
                </h2>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl shadow-blue-500/50 rounded-none">                   

                    <div class="flex items-start">
                        <div class="mx-auto w-full px-5 py-5">
                            <div class="flex items-center justify-center">
                                <div class="inline-flex text-center shadow-md hover:shadow-lg focus:shadow-lg" role="group">
                                    <Link
                                    :href="route('informasi-dikecualikan.id1')"
                                    aria-current="page"
                                    :class="
                                        route().current('informasi-dikecualikan.id1')    
                                        ? 'rounded-l px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out'
                                        : 'rounded-l px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700'
                                        "
                                    >
                                    Hasil Uji Konsekuensi Yang Diterima
                                    </Link>
                                    <Link
                                    :href="route('informasi-dikecualikan.id2')"
                                    :class="
                                        route().current('informasi-dikecualikan.id2')   
                                        ? 'rounded-r px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out'
                                        : 'rounded-r px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700'
                                    "
                                    >
                                    Hasil Uji Konsekuensi Yang Ditolak
                                    </Link>
                                </div>
                            </div>

                            <h3 class="text-2xl font-bold mb-3 pt-5 text-gray-800">{{title}}</h3>

                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full">
                                                <thead class="border-b bg-info">
                                                    <th colspan="2" scope="col" class=" py-2"> </th>                                        
                                                </thead>
                                                <tbody>
                                                    <tr v-for="row in data" class="border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ row.nama }}</td>
                                                        <td class="text-sm text-gray-900 text-right font-light px-6 py-4 whitespace-nowrap">
                                                            <a :href="row.path">Ambil FIle</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
    </PublicLayout>
</template>