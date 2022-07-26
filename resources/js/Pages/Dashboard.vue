<script>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link, Head } from "@inertiajs/inertia-vue3";
export default {
    created() {
        document.title = "Dashboard";
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
        },
        getPostBody (row) {
            let isi = this.stripTags(row.isi);

            return isi.length > 100 ? isi.substring(0, 100) + '.....' : isi;           
        },

        stripTags (text) {
            return text.replace(/(<([^>]+)>)/ig, '');
        }
    },
}
</script>

<template>
    <PublicLayout title="Dashboard">
        <div class="carousel w-full">
            <div id="item1" class="carousel-item w-full">
                <img src="/images/PPID_BANNER.jpg" class="w-full" />
            </div> 
        </div> 

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <section class="mb-20 text-gray-700">
                    <div class="grid md:grid-cols-4 gap-6 lg:gap-12 text-center">
                        <div class="mb-12 md:mb-0">
                            <div class="flex justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 fill-[#570DF8] hover:fill-[#1d4ed8] hover:animate-bounce" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                            </div>
                            <h5 class="text-xl font-semibold mb-4">Alamat</h5>
                            <h7 class="mb-4">
                                Pusat Pelayanan Informasi Publik<br />
                                Daerah Provinsi Sulawesi Tengah<br />
                                Jl. R.A. Kartini No.106<br />
                                Kode Pos 94111<br />
                                Palu, Sulawesi Tengah 
                            </h7>
                        </div>
                        <div class="mb-12 md:mb-0">
                            <div class="flex justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 fill-[#570DF8] hover:fill-[#1d4ed8] hover:animate-bounce" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h5 class="text-xl font-semibold mb-4">Waktu Pelayanan</h5>
                            <h6 class="mb-4">
                                Senin - Kamis : 08.00 - 16.00 WITA<br />
                                Jumat : 08.00 - 17.00 WITA<br />
                                Sabtu/Minggu : Online<br />
                            </h6>
                        </div>
                        <div class="mb-0">
                            <div class="flex justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 fill-[#570DF8] hover:fill-[#1d4ed8] hover:animate-bounce" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </div>
                            <h5 class="text-xl font-semibold mb-4">Telepon</h5>
                            <h6 class="mb-4">Kantor : 0823-4888-6767</h6>
                        </div>
                        <div class="mb-0">
                            <div class="flex justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 fill-[#570DF8] hover:fill-[#1d4ed8] hover:animate-bounce" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <h5 class="text-xl font-semibold mb-4">Email</h5>
                            <h6 class="mb-4">diskominfo.sulteng@gmail.com</h6>
                        </div>
                    </div>
                </section>

                <div class="w-full mt-0 shadow-xl shadow-blue-500/50 bg-white left-0 top-full">
                    <div class="px-6 lg:px-8 py-5">
                        <h3 class="text-3xl font-bold mb-3 text-center text-gray-800">PORTAL BERITA</h3>
                        <div class="grid md:grid-cols-3 gap-6 pb-5">
                            <div v-for="row in data" class="bg-white">
                                <div class="relative overflow-hidden bg-no-repeat bg-cover py-4" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                    <img :src="showImage() + row.path" class="h-64 w-full rounded-md" alt="Louvre" />
                                    <a>
                                        <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                    </a>
                                </div>
                                <div class="flex items-center justify-between mt-1 mb-3">
                                    <p class="text-gray-700"><u>{{ row.updated_at }}</u></p>
                                </div>
                                <h5 class="text-xl mb-2 text-gray-700 font-semibold text-justify"><Link :href="route('berita.detail', row.slug)">{{ row.judul }}</Link></h5>
                                <p class="text-gray-700 text-justify">{{ getPostBody(row) }}<Link :href="route('berita.detail', row.slug)" class="text-blue-700 hover:text-blue-500"> selengkapnya</Link></p>
                            </div>
                        </div><hr />
                        <div class="text-center pt-5">
                            <Link :href="route('berita.index')"
                                class="btn btn-primary">
                                Lihat Lebih Banyak
                            </Link>                                               
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </PublicLayout>
</template>
