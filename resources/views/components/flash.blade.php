            @if(session('error'))
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    class="bg-red-100 text-red-800 p-4 rounded mb-4"
                >
                    {{ session('error') }}
                    <button @click="show = false" class="float-right text-red-800">&times;</button>
                </div>
            @endif
            
            @if(session('success'))
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    class="bg-green-100 text-green-800 p-4 rounded mb-4"
                >
                    {{ session('success') }}
                    <button @click="show = false" class="float-right text-green-800">&times;</button>
                </div>
            @endif