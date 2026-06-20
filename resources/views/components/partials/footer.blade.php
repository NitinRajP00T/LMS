<footer class="bg-gray-900 text-gray-300 mt-16">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Company Info -->
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <span class="text-xl font-bold text-white">EduLearn</span>
                </div>
                <p class="text-sm text-gray-400">Learn, grow, and transform your career with quality online education.</p>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('courses.browse') }}" class="text-gray-400 hover:text-white transition">Courses</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                </ul>
            </div>
            
            <!-- For Instructors -->
            <div>
                <h3 class="text-white font-semibold mb-4">For Instructors</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Become Instructor</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Instructor Support</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Revenue Sharing</a></li>
                </ul>
            </div>
            
            <!-- Support -->
            <div>
                <h3 class="text-white font-semibold mb-4">Support</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Help Center</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Divider -->
        <hr class="border-gray-700 my-8">
        
        <!-- Bottom Section -->
        <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} EduLearn. All rights reserved.</p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-white transition"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
