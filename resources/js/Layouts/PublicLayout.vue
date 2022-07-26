<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue';
import JetBanner from '@/Jetstream/Banner.vue';
import JetDropdown from '@/Jetstream/Dropdown.vue';
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
import JetNavLink from '@/Jetstream/NavLink.vue';
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue';

defineProps({
    title: String,
});
</script>

<template>
    <div>
        <Head :title="title" />

        <div class="min-h-screen bg-white-100">

            <nav class="navbar text-neutral-content mt-0 bg-primary">
                <div class="navbar-start">
                    <div class="dropdown text-info-content">
                        <label tabindex="0" class="btn btn-ghost text-neutral-content lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                        </label>
                        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                            <li tabindex="0">
                                <a
                                    class="justify-between">PROFIL
                                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/></svg>
                                </a> 
                                <ul class="p-2 bg-base-100">
                                    <li>
                                        <Link
                                            :href="route('profil.sejarah')">SEJARAH
                                        </Link> 
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('profil.vm')">VISI DAN MISI
                                        </Link> 
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('profil.tf')">TUGAS DAN FUNGSI
                                        </Link> 
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('profil.so')">STRUKTUR ORGANISASI
                                        </Link> 
                                    </li>
                                </ul>
                            </li>
                            <li>                     
                                <Link class="justify-between" :href="route('dip')">DAFTAR INFORMASI PUBLIK</Link>     
                            </li>
                            <li>
                                <Link
                                    :href="route('informasi-publik.ip1')"
                                    class="justify-between">INFORMASI PUBLIK
                                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/></svg>
                                </Link> 
                                <ul class="p-2 bg-base-100">
                                    <li>
                                        <Link
                                            :href="route('informasi-publik.ip1')">INFORMASI SECARA BERKALA
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('informasi-publik.ip2')">INFORMASI SERTA MERTA
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('informasi-publik.ip3')">INFORMASI SETIAP SAAT
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('informasi-publik.ip4')">TATA CARA PERMOHONAN
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('informasi-publik.ip5')">HAK DAN KEWAJIBAN BADAN PUBLIK
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('informasi-publik.ip6')">HAK DAN KEWAJIBAN PEMOHON
                                        </Link>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="justify-between">INFORMASI DIKECUALIKAN
                                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/></svg>
                                </a> 
                                <ul class="p-2 bg-base-100">
                                    <li>
                                        <Link
                                            :href="route('informasi-dikecualikan.id1')">HASIL UJI KONSEKUENSI YANG DITERIMA
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('informasi-dikecualikan.id2')">HASIL UJI KONSEKUENSI YANG DITOLAK
                                        </Link>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="justify-between">LAYANAN PUBLIK
                                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/></svg>
                                </a>
                                <ul class="p-2 bg-base-100">
                                    <li>
                                        <Link
                                            :href="route('layanan-publik.lp1')">FORM PERMOHONAN INFORMASI PUBLIK
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('layanan-publik.lp2')">FORM PENYAMPAIAN KEBERATAN
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('layanan-publik.lp3')">FORM SURVEY LAYANAN INFORMASI PUBLIK
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('layanan-publik.lp4')">FORM SURVEY KEPUASAN MASYARAKAT
                                        </Link>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>                      
                    <Link :href="route('dashboard')" class="hover:bg-primary">
                        <img src="/images/logo.png" alt="Image" class="object-fill h-12 w-56" /> 
                    </Link>                      
                </div>
                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal p-0">
                        <li tabindex="0">
                            <Link>PROFIL</Link> 
                            <ul class="p-2 bg-base-100 text-info-content">
                                <li>
                                    <Link
                                        :href="route('profil.sejarah')">SEJARAH
                                    </Link> 
                                </li>
                                <li>                                    
                                    <Link
                                        :href="route('profil.vm')">VISI DAN MISI
                                    </Link> 
                                </li>
                                <li>                           
                                    <Link
                                        :href="route('profil.tf')">TUGAS DAN FUNGSI
                                    </Link> 
                                </li>
                                <li><a>STRUKTUR ORGANISASI</a></li>
                            </ul>
                        </li>
                        <li>
                            <Link
                                :href="route('dip')">DAFTAR INFORMASI PUBLIK  
                            </Link> 
                        </li>
                        <li>
                            <a>INFORMASI PUBLIK</a>
                            <ul class="p-2 bg-base-100 text-info-content">
                                <li>
                                    <Link
                                        :href="route('informasi-publik.ip1')">INFORMASI SECARA BERKALA
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('informasi-publik.ip2')">INFORMASI SERTA MERTA
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('informasi-publik.ip3')">INFORMASI SETIAP SAAT
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('informasi-publik.ip4')">TATA CARA PERMOHONAN
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('informasi-publik.ip5')">HAK DAN KEWAJIBAN BADAN PUBLIK
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('informasi-publik.ip6')">HAK DAN KEWAJIBAN PEMOHON
                                    </Link>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a>INFORMASI DIKECUALIKAN</a>
                            <ul class="p-2 bg-base-100 text-info-content">
                                <li>
                                    <Link
                                        :href="route('informasi-dikecualikan.id1')">HASIL UJI KONSEKUENSI YANG DITERIMA
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('informasi-dikecualikan.id2')">HASIL UJI KONSEKUENSI YANG DITOLAK
                                    </Link>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a>LAYANAN PUBLIK</a>
                            <ul class="p-2 bg-base-100 text-info-content">
                                <li>
                                    <Link
                                        :href="route('layanan-publik.lp1')">FORM PERMOHONAN INFORMASI PUBLIK
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('layanan-publik.lp2')">FORM PENYAMPAIAN KEBERATAN
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('layanan-publik.lp3')">FORM SURVEY LAYANAN INFORMASI PUBLIK
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('layanan-publik.lp4')">FORM SURVEY KEPUASAN MASYARAKAT
                                    </Link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navbar-end hidden lg:flex">
                        <div class="grid grid-flow-col gap-4">
                                <a href="https:www.facebook.com/diskominfo.sultengprov" class="hover:text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a> 
                                <a href="https:www.instagram.com/diskominfo.sultengprov" class="hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
                                <a href="https:www.instagram.com/diskominfo.sultengprov" class="hover:text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
                        </div>
                </div>   
            </nav>

            <!-- Page Content -->
            <main>
                <slot />
            </main><hr />

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <footer class="footer p-10 bg-white-100 text-base-content">
                    <div>
                        <span class="footer-title">Kontak Kami</span> 
                        <a class="link link-hover">Tlp : 0823 4888 6767</a> 
                        <a class="link link-hover">Fax : ---</a> 
                        <a class="link link-hover">Email : diskominfo.sulteng@gmail.com</a> 
                    </div> 
                    <div>
                        <span class="footer-title">PPID Provinsi Sulawesi Tengah</span> 
                        <a class="link link-hover">Jl. R.A. Kartini No.106, Kode Pos 94111</a> 
                        <a class="link link-hover">Palu, Sulawesi Tengah</a> 
                    </div> 
                    <div>
                        <span class="footer-title">Media Sosial</span> 
                        <div class="grid grid-flow-col gap-4">
                            <a href="https:www.facebook.com/diskominfo.sultengprov" class="text-blue-500 hover:text-blue-300"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a> 
                            <a href="https:www.instagram.com/diskominfo.sultengprov" class="text-red-500 hover:text-red-400"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
                            <a href="https:www.instagram.com/diskominfo.sultengprov" class="text-blue-600 hover:text-blue-400"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
                        </div>
                    </div>
                </footer><hr />
                <footer class="footer px-10 py-4 bg-white-100 text-base-content">
                    <div class="items-center grid-flow-col">
                        <p>© 2022 All rights reserved</p>
                    </div> 
                </footer>
            </div>
        </div>
    </div>
</template>
