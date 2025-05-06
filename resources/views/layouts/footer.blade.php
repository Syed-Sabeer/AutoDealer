 <!-- footer start-->
 {{-- <footer class="footer">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">{{__('Copyright')}} {{ date('Y') }} © {{__(''.env('APP_NAME'))}} </p>
             </div>
         </div>
     </div>
 </footer> --}}

 <footer class="content-footer footer bg-footer-theme">
     <div class="container-xxl">
         <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
             <div class="text-body">
                 © {{ date('Y') }}
                 , {{ \App\Helpers\Helper::getfooterText() }}
             </div>
         </div>
     </div>
 </footer>
