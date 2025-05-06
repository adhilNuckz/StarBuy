

@extends('layouts.app')




@section('content')







<div class="slide-one-item home-slider owl-carousel">



    <div class="site-blocks-cover overlay" style="background-image: url({{asset("assets")}}/images/hero_bg_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5>
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
              <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded"></span>
              <h1 class="mb-2">Rent Properties</h1>
            </div>
          </div>
        </div>
      </div>  
    
  

   

  </div>










{{-- card view --}}
<div class="site-section site-section-sm bg-light">
    <div class="container">
  
      <div class="row mb-5">
  
        @foreach ( $propsRent as $prop )
  
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="property-entry h-100">
            <a href="{{route('prop.detaile' , $prop->prop_id)}}" class="property-thumbnail">
              <div class="offer-type-wrap">
               
               
               @if ($prop->deal_type == 'Sale')
               <span class="offer-type bg-danger">Sale</span>
               
               @endif
  
  
               @if ($prop->deal_type == 'Rent')
               <span class="offer-type bg-success">Rent</span>
               
               @endif
              </div>
              <img src="{{asset("assets")}}/images/{{$prop->bgimage}}" alt="Image" class="img-fluid">
            </a>
            <div class="p-4 property-body">
              <a href="{{route('prop.detaile' , $prop->prop_id)}}" class="property-favorite"><span class="icon-heart-o"></span></a>
              <h2 class="property-title"><a href="property-details.html">{{$prop->title}}</a></h2>
              <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>{{$prop->address}}</span>
              <strong class="property-price text-primary mb-3 d-block text-success">{{$prop->price}}</strong>
              <ul class="property-specs-wrap mb-3 mb-lg-0">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number">{{$prop->beds}} <sup>+</sup></span>
                  
                </li>
                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number">{{$prop->baths}}</span>
                  
                </li>
                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number">{{$prop->sqft}}</span>
                  
                </li>
              </ul>
  
            </div>
          </div>
        </div>
        @endforeach
  
      </div>
    </div>
  </div>
   

  @endsection