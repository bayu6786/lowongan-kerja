<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                <i class="fas fa-briefcase mr-2 text-blue-600"></i>
                Daftar Lowongan Kerja
            </h2>
            <div class="text-sm text-gray-500">
                {{ count($jobs) }} lowongan tersedia
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter/Search Bar (Optional) -->
            <div class="mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <div class="flex flex-wrap gap-4 items-center">
                        <div class="text-sm font-medium text-gray-700">Filter:</div>
                        <!-- Add filter buttons here if needed -->
                    </div>
                </div>
            </div>

            <!-- Jobs Grid -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($jobs as $job)
                    <div class="group bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-xl hover:border-blue-200 transition-all duration-300 overflow-hidden">
                        <!-- Header Card -->
                        <div class="p-6 pb-4">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-700 transition-colors duration-200 mb-1">
                                        <a  class="hover:underline line-clamp-2">{{ $job->position }}</a>
                                    </h3>
                                    <p class="text-blue-600 font-medium text-sm mb-2">
                                        <i class="fas fa-building text-xs mr-1"></i>
                                        {{ $job->company_name }}
                                    </p>
                                </div>
                                
                                <!-- Status Badge -->
                                @if (now()->gt($job->expiration_date))
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                        <i class="fas fa-clock text-xs mr-1"></i>
                                        Kadaluarsa
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        <i class="fas fa-check-circle text-xs mr-1"></i>
                                        Aktif
                                    </span>
                                @endif
                            </div>

                            <!-- Location -->
                            <div class="flex items-center text-gray-600 text-sm mb-4">
                                <i class="fas fa-map-marker-alt text-red-400 mr-2"></i>
                                {{ $job->location }}
                            </div>
                        </div>

                        <!-- Job Details -->
                        <div class="px-6 pb-4">
                            <!-- Job Type -->
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                    <i class="fas fa-user-tie text-xs mr-1"></i>
                                    {{ $job->job_type }}
                                </span>
                            </div>

                            <!-- Job Description -->
                            <div class="text-gray-700 text-sm leading-relaxed mb-4">
                                {{ Str::limit(strip_tags($job->job_description), 120) }}
                            </div>

                            <!-- Key Details Grid -->
                            <div class="grid grid-cols-1 gap-2 text-xs text-gray-600">
                                <!-- Qualifications -->
                                <div class="flex items-start">
                                    <i class="fas fa-graduation-cap text-blue-400 mt-0.5 mr-2 flex-shrink-0"></i>
                                    <div>
                                        <span class="font-medium">Kualifikasi:</span>
                                        <span class="ml-1">{{ Str::limit($job->qualification, 60) }}</span>
                                    </div>
                                </div>

                                <!-- Salary -->
                                @if($job->salary)
                                <div class="flex items-center">
                                    <i class="fas fa-money-bill-wave text-green-400 mr-2"></i>
                                    <span class="font-medium">Gaji:</span>
                                    <span class="ml-1 text-green-700 font-semibold">{{ $job->salary }}</span>
                                </div>
                                @endif

                                <!-- Contact -->
                                @if($job->contact)
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-purple-400 mr-2"></i>
                                    <span class="font-medium">Kontak:</span>
                                    <span class="ml-1">{{ $job->contact }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                            <div class="flex items-center justify-between">
                                <div class="text-xs text-gray-500">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    Berakhir: {{ \Carbon\Carbon::parse($job->expiration_date)->format('d M Y') }}
                                </div>
                            </div>
                        </div>

                        <!-- Hover Effect Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full">
                        <div class="text-center py-16">
                            <div class="mx-auto h-24 w-24 text-gray-300 mb-4">
                                <i class="fas fa-briefcase text-6xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada lowongan tersedia</h3>
                            <p class="text-gray-500">Silakan coba lagi nanti atau hubungi admin untuk informasi lebih lanjut.</p>
                        </div>
                    </div>
                @endforelse
            </div>

    <!-- Custom Styles -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .group:hover .group-hover\:scale-105 {
            transform: scale(1.05);
        }
        
        /* Smooth hover animations */
        .transition-all {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</x-app-layout>