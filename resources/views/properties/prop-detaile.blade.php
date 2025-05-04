
@extends('layouts.app')



@section('content')


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('assets/images/'.$propDetaile->bgimage.'')}});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
          <h1 class="mb-2">{{$propDetaile->title}}</h1>
          <p class="mb-5"><strong class="h2 text-success font-weight-bold">{{$propDetaile->price}}</strong></p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div>
            <div class="slide-one-item home-slider owl-carousel">
             
             @foreach ( $propImages as $propImage )

             <div><img src="{{asset('assets/images/'.$propImage->image.'')}}" alt="Image" class="img-fluid"></div>

             
             @endforeach
             
            
            </div>


            
          </div>
          <div class="bg-white property-body border-bottom border-left border-right">
            <div class="row mb-5">
              <div class="col-md-6">
                <strong class="text-success h1 mb-3">{{$propDetaile->price}}</strong>
              </div>
              <div class="col-md-6">
                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number">{{$propDetaile->beds}} <sup>+</sup></span>
                  
                </li>
                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number">{{$propDetaile->baths}}</span>
                  
                </li>
                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number">{{$propDetaile->sqft}}</span>
                  
                </li>
              </ul>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                <strong class="d-block">{{$propDetaile->type}}</strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                <strong class="d-block">{{$propDetaile->year_built}}</strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                <strong class="d-block">{{$propDetaile->price_sqft}}</strong>
              </div>
            </div>
            <h2 class="h4 text-black">More Info</h2>
            <p>{{$propDetaile->description}}</p>
           
            <div class="row no-gutters mt-5">
              <div class="col-12">
                <h2 class="h4 text-black mb-3">Gallery</h2>
              </div>


          @foreach ( $propImages as $gallery )

          <div class="col-sm-6 col-md-4 col-lg-3">
            <a href=" {{asset('assets/images/'.$gallery->image.'')}}" class="image-popup gal-item"><img src=" {{asset('assets/images/'.$gallery->image.'')}}" alt="Image" class="img-fluid"></a>
          </div>
          
          @endforeach
              
            
            
            </div>
          </div>
        </div>
        <div class="col-lg-4">

          <div class="bg-white widget border rounded">


            @if (\Session::has('success')) 
                <div class="alert alert-success">
                        <p>{!! \Session::get('success') !!}</p>
                </div>
            @endif   



            <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
          
          
          
            <form  method="post" action="{{route('make.request' ,$propDetaile->prop_id)}}" class="form-contact-agent">
              @csrf


              <input type="text" id="prop_id" name="prop_id" value="{{$propDetaile->prop_id}}" class="form-control" hidden required>
              <input type="text" id="agent_name" name="agent_name" value="{{$propDetaile->agent_name}}" class="form-control"  hidden required>

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required> 
              </div>

              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror


              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
              </div>

              @error('email')
              <span class="text-danger">{{$message}}</span>
              @enderror


              <div class="form-group">
                <label for="phone">Message</label>
                <input type="text" id="message" name="message" class="form-control" required>
              </div>

              @error('message')
              <span class="text-danger">{{$message}}</span>
              @enderror


              

              <div class="form-group">
                <input type="submit" id="phone" name="submit" class="btn btn-primary" value="Send Message">
              </div>
           
           
           
            </form>
          </div>

          <div class="bg-white widget border rounded">
            <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                <div class="px-3" style="margin-left: -15px;">
                  <a href="https://www.facebook.com/sharer/sharer.php?u={{route('prop.detaile' , $propDetaile->prop_id)}}&quote={{$propDetaile->title}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                  <a  href="https://twitter.com/intent/tweet?text=&url=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                  <a href="https://www.linkedin.com/sharing/share-offsite/?url=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>    
                </div>            
          </div>

        </div>
        
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm bg-light">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <div class="site-section-title mb-5">
            <h2>Related Properties</h2>
          </div>
        </div>
      </div>
    
      <div class="row mb-5">
        @if ($relproperties->count() > 0)

              @foreach ( $relproperties as $relprop )

                      @if ( $relprop->deal_type == $propDetaile->deal_type )
                      
                      <div class="col-md-6 col-lg-4 mb-4">
                  
                        
                        <div class="property-entry h-100">
                          <a href="{{route('prop.detaile' , $relprop->prop_id)}}" class="property-thumbnail">
                            <div class="offer-type-wrap">
                              <span class="offer-type bg-info">{{$relprop->deal_type}}</span>
                            </div>
                            <img src="{{asset('assets/images/'.$relprop->bgimage.'')}}" alt="Image" class="img-fluid">
                          </a>
                          <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">{{$relprop->title}}</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>{{$relprop->address}}</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">{{$relprop->price}}</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                              <li>
                                <span class="property-specs">Beds</span>
                                <span class="property-specs-number">{{$relprop->beds}} <sup>+</sup></span>
                                
                              </li>
                              <li>
                                <span class="property-specs">Baths</span>
                                <span class="property-specs-number">{{$relprop->baths}}</span>
                                
                              </li>
                              <li>
                                <span class="property-specs">SQ FT</span>
                                <span class="property-specs-number">{{$relprop->sqft}}</span>
                                
                              </li>
                            </ul>

                          </div>
                        </div>
                        

                  
                  
                      </div>

                      @endif
                      
              @endforeach


        @else

                
        <p>No Properties Found</p>
        
        @endif
        




      </div>
    </div>
    
    @endsection
