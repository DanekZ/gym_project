<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Membership Plan Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form method="POST" action="/member/store">
                     @csrf
                     <div class="space-y-12">

                        <div class="border-b border-white/10 pb-12">
                            <div class="sm:col-span-3">
                           <label for="member_id" class="block text-sm/6 font-medium text-grey">Member Type</label>
                           <div class="mt-2 grid grid-cols-1">
                              <select id="member_id" name="member_id" autocomplete="country-name" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/66">
                              @foreach ($member_plan_data as $mp)
                               <option value={{ $mp->id }}>{{ $mp->name }}</option>
                              @endforeach
                              </select>
                           </div>
                        </div>

                           <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                           <div class="col-span-full">
                              <label for="name" class="block text-sm/6 font-medium text-grey">Name</label>
                             <div class="mt-2">
                                 <input id="name" type="text" name="name" autocomplete="given-name" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                              </div>
                           </div>
                           <div class="col-span-full">
                              <label for="name" class="block text-sm/6 font-medium text-grey">Phone</label>
                             <div class="mt-2">
                                 <input id="phone" type="number" name="phone" autocomplete="given-name" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" min="0" required   />
                              </div>
                           </div>
                           <div class="col-span-full">
                              <label for="description" class="block text-sm/6 font-medium text-grey">Address</label>
                              <div class="mt-2">
                                 <textarea name="address" id="address" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"></textarea>
                              </div>
                           </div>

                           <div class="col-span-full">
                              <label for="name" class="block text-sm/6 font-medium text-grey">Join Date</label>
                             <div class="mt-2">
                                 <input id="name" type="date" name="join_date" autocomplete="given-name" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                              </div>
                           </div>

                              <div class="border-b border-white/10 pb-12">
                              <div class="sm:col-span-3">
                                 <label for="status" class="block text-sm/6 font-medium text-grey">Status</label>
                                 <div class="mt-2 grid grid-cols-1">
                                    <select id="status" name="status" autocomplete="status" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/66">
                                    <option value="active">Active</option>
                                    <option value="suspend">Suspend</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm/6 font-semibold text-black border">Cancel</button>
                        <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                     </div>
                     </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
