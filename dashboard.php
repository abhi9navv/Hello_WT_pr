<?php
// dashboard.php
// Included by index.php when authenticated
if (!isset($_SESSION['user_id'])) {
    // Should be handled by index.php, but good for safety
    header('Location: index.php?view=login');
    exit;
}
?>

<div id="dashboard-layout" class="fixed inset-0 flex bg-gray-100">
    
    <div class="w-16 md:w-64 bg-[var(--sidebar-bg)] text-white flex flex-col transition-all duration-300">
        <div class="p-4 flex items-center h-16 border-b border-gray-700">
            <h2 class="text-xl font-bold whitespace-nowrap hidden md:block">Laundry Managment System</h2>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:hidden cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>
        
        <nav class="flex-grow mt-4 space-y-2">
            <div class="sidebar-link active">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2.586a1 1 0 011-.914h2a1 1 0 011 .914V17a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293-.293a1 1 0 00-1.414-1.414l-7-7z"/></svg>
                <span class="hidden md:block">Dashboard</span>
            </div>
            <div class="sidebar-link group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M10 2a6 6 0 00-6 6v3.586l-1.707 1.707A1 1 0 004 15h16a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zm0 14a2 2 0 110-4 2 2 0 010 4z"/></svg>
                <span class="hidden md:block">Laundry Request</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto hidden md:block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            </div>
            <div class="sidebar-link group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"/></svg>
                <span class="hidden md:block">Request Status</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto hidden md:block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            </div>
        </nav>
        
        <div class="p-4 mt-auto">
            <a href="index.php?action=logout" class="w-full text-red-400 hover:text-red-300 text-sm py-2 rounded transition hidden md:block">
                Logout
            </a>
        </div>
    </div>

    <div class="flex-grow flex flex-col">
        <header class="bg-white shadow-sm h-16 flex items-center justify-between px-4 sm:px-6">
            <h1 class="text-lg font-semibold text-gray-700">Laundry Managment System</h1>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-500 hidden sm:block">Welcome, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?>!</span>
                <div class="w-8 h-8 bg-blue-200 rounded-full flex items-center justify-center text-blue-800 font-bold text-sm">U</div>
            </div>
        </header>
        
        <main class="flex-grow p-4 sm:p-6 bg-gray-100 overflow-y-auto">
            
            <nav class="text-sm mb-6 text-gray-500">
                <span class="hover:text-gray-700 cursor-pointer">Dashboard</span> / <span class="text-gray-900 font-medium">Overview</span>
            </nav>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                
                <div class="relative bg-yellow-400 text-white rounded-lg shadow-lg overflow-hidden h-32 flex items-center p-4">
                    <div class="flex flex-col z-10">
                        <span class="text-3xl font-bold">0 New Request</span>
                        <button class="text-sm font-semibold bg-white/30 hover:bg-white/50 px-3 py-1 rounded-full mt-2 transition">View Details</button>
                    </div>
                    <div class="absolute right-0 top-0 opacity-20 transform scale-[3] translate-x-1/4 translate-y-1/4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="white" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.44c-.16.27-.25.57-.25.88 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.49c.71 0 1.36-.34 1.76-.84l3.13-5.26c.27-.47.16-1.09-.32-1.36-.47-.27-1.09-.16-1.36.32L21 4H5.21L4.27 2H1zm17 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                    </div>
                </div>
                
                <div class="relative bg-blue-500 text-white rounded-lg shadow-lg overflow-hidden h-32 flex items-center p-4">
                    <div class="flex flex-col z-10">
                        <span class="text-3xl font-bold">0 Accept!</span>
                        <button class="text-sm font-semibold bg-white/30 hover:bg-white/50 px-3 py-1 rounded-full mt-2 transition">View Details</button>
                    </div>
                    <div class="absolute right-0 top-0 opacity-20 transform scale-[3] translate-x-1/4 translate-y-1/4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="white" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.44c-.16.27-.25.57-.25.88 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.49c.71 0 1.36-.34 1.76-.84l3.13-5.26c.27-.47.16-1.09-.32-1.36-.47-.27-1.09-.16-1.36.32L21 4H5.21L4.27 2H1zm18 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                    </div>
                </div>

                <div class="relative bg-green-500 text-white rounded-lg shadow-lg overflow-hidden h-32 flex items-center p-4">
                    <div class="flex flex-col z-10">
                        <span class="text-3xl font-bold">0 Inprocess!</span>
                        <button class="text-sm font-semibold bg-white/30 hover:bg-white/50 px-3 py-1 rounded-full mt-2 transition">View Details</button>
                    </div>
                    <div class="absolute right-0 top-0 opacity-20 transform scale-[3] translate-x-1/4 translate-y-1/4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="white" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.44c-.16.27-.25.57-.25.88 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.49c.71 0 1.36-.34 1.76-.84l3.13-5.26c.27-.47.16-1.09-.32-1.36-.47-.27-1.09-.16-1.36.32L21 4H5.21L4.27 2H1zm18 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                    </div>
                </div>

                <div class="relative bg-red-500 text-white rounded-lg shadow-lg overflow-hidden h-32 flex items-center p-4">
                    <div class="flex flex-col z-10">
                        <span class="text-3xl font-bold">1 Finish!</span>
                        <button class="text-sm font-semibold bg-white/30 hover:bg-white/50 px-3 py-1 rounded-full mt-2 transition">View Details</button>
                    </div>
                    <div class="absolute right-0 top-0 opacity-20 transform scale-[3] translate-x-1/4 translate-y-1/4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="white" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.44c-.16.27-.25.57-.25.88 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.49c.71 0 1.36-.34 1.76-.84l3.13-5.26c.27-.47.16-1.09-.32-1.36-.47-.27-1.09-.16-1.36.32L21 4H5.21L4.27 2H1zm18 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-700 mb-4 text-center">Laundry Price (Per Unit)</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900 w-1/2">Top Wear Laundry Price</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-700 w-1/2">12</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Bottom Wear Laundry Price</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-700">22</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Woolen Cloth Laundry Price</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-700">20</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Other Price</td>
                                <td class="px-6 py-3 text-sm text-gray-700">Other Price depend upon cloth variety(other than above three category)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-center text-xs text-gray-500 mt-6">Copyright © Laundry Managment System 2019</p>
            </div>
        </main>
    </div>
</div>