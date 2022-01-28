<div class="bg-white m-4 p-4 md:px-12 justify-between flex rounded-lg items-center">
          <p class="text-lg font-bold text-center">Dreamzzz</p>
          <!-- photo admin panel start-->
          <div>
            <button data-dropdown-toggle="dropdown" class="text-left">
            <p class="font-bold "><?php echo $_SESSION['firstname']; ?></p>
            <p class="text-gray-500 text-sm font-bold"><?php echo $_SESSION['position']; ?></p>
            </button>
            <!-- drop down menu start -->
            <div class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-gray-100 hover:bg-gray-200 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="dropdown">
              <div class="py-1" role="none">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
            
                <form method="POST" action="util/logout.php" role="none">
                
                  <button type="submit" class="text-gray-700 block w-full text-left px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                  </svg>  
                  <span>Sign out</span>
                  </button>
                </form>
              </div>
            </div>
        
            <!-- drop down menu ends -->
          </div>
          <!-- photo admin panel end -->
</div>
 