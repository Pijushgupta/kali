<!-- Toast.vue -->
<!-- Toast wrapper to host Toastify html -->
<template>
    <Teleport to="body">
        <div>
            <div>
                <!-- top-left -->
                <div class="z-40 fixed p-1 w-[600px] box-border flex flex-col  min-h-screen pointer-events-none md:left-4  md:top-4 top-left">
                    
                </div>
            </div>
      
            <div>
                <!-- top-center -->
                <div class="z-40 fixed p-1 w-[600px] box-border flex flex-col items-center min-h-screen pointer-events-none md:left-1/2 md:-ml-[300px]   md:top-4 top-center">
                    
                </div>
            </div>
      
            <div>
                <!-- top-right -->
                <div class="z-40 fixed p-1 w-[600px] box-border flex flex-col items-end min-h-screen pointer-events-none  md:right-4  md:top-4 top-right">
                   
                </div>
            </div>
        
            <div>
                <!-- bottom-left -->
                <div class="z-40 fixed p-1 w-[600px] box-border flex flex-col md:flex-col-reverse min-h-screen pointer-events-none md:left-4  md:bottom-4 bottom-left">
                    
                </div>
            </div>
            <div>
                <!-- bottom-center -->
                <div class="z-40 fixed p-1 w-[600px] box-border flex flex-col md:flex-col-reverse items-center min-h-screen pointer-events-none md:left-1/2 md:-ml-[300px]  md:bottom-4 bottom-center">
                    
                </div>
            </div>
            <div>
                <!-- bottom-right -->
                <div class="z-40 fixed p-1 w-[600px] box-border flex flex-col md:flex-col-reverse items-end min-h-screen pointer-events-none md:right-4  md:bottom-4 bottom-right">
                    

                </div>
            </div>
        </div>
    </Teleport>
</template>
