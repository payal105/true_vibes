<?php include 'header.php'; ?>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
.properties-page {
  background-color: #f8f9fa;
  padding: 60px 0;
}

.property-card {
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0,0,0,0.08);
  margin-bottom: 30px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  height: 100%;
  display: flex;
  flex-direction: column;
}

.property-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.property-image-wrapper {
  position: relative;
  overflow: hidden;
  height: 300px;
}

.property-slider {
  height: 100%;
}

.property-slider .swiper-slide {
  height: 300px;
}

.property-slider .swiper-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.property-badges {
  position: absolute;
  top: 15px;
  left: 15px;
  display: flex;
  gap: 8px;
  z-index: 10;
}

.badge-tag {
  padding: 6px 14px;
  border-radius: 4px;
  font-size: 13px;
  font-weight: 600;
  color: white;
  text-transform: capitalize;
}

.badge-featured {
  background-color: #dc3545;
}

.badge-popular {
  background-color: #dc3545;
}

.swiper-pagination {
  bottom: 10px !important;
}

.swiper-pagination-bullet {
  background: white;
  opacity: 0.7;
}

.swiper-pagination-bullet-active {
  background: white;
  opacity: 1;
}

.property-content {
  padding: 25px;
  position: relative;
  flex: 1;
  display: flex;
  flex-direction: column;
}

.content-wrapper {
  position: relative;
  max-height: 300px;
  overflow: hidden;
  transition: max-height 0.3s ease-out;
  margin-bottom: 15px;
}

.content-wrapper.expanded {
  max-height: 2000px;
  transition: max-height 0.5s ease-in;
}

.read-more-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 80px;
  background: linear-gradient(to bottom, transparent, white);
  pointer-events: none;
  transition: opacity 0.3s ease;
}

.content-wrapper.expanded .read-more-overlay {
  opacity: 0;
}

.read-more-link {
  color: #0066cc;
  text-decoration: none;
  font-weight: 500;
  display: inline-flex;
  align-items: center;
  gap: 5px;
  margin-top: auto;
  cursor: pointer;
  font-size: 14px;
}

.read-more-link:hover {
  color: #0052a3;
  text-decoration: underline;
}

.read-more-link i {
  font-size: 12px;
  transition: transform 0.3s ease;
}

.read-more-link.expanded i {
  transform: rotate(180deg);
}

.property-title {
  font-size: 22px;
  font-weight: 700;
  color: #2d3436;
  margin-bottom: 15px;
  line-height: 1.3;
}

.property-title:hover {
  color: #0066cc;
  cursor: pointer;
}

.property-description {
  color: #636e72;
  font-size: 14px;
  line-height: 1.6;
  margin-bottom: 20px;
}

.property-meta {
  display: flex;
  flex-direction: column;
  gap: 12px;
  margin-bottom: 20px;
}

.meta-item {
  display: flex;
  align-items: center;
  color: #636e72;
  font-size: 14px;
}

.meta-item i {
  width: 18px;
  margin-right: 10px;
  color: #95a5a6;
}

.meta-item .icon-custom {
  width: 18px;
  height: 18px;
  margin-right: 10px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

.progress-wrapper {
  display: flex;
  align-items: center;
  gap: 10px;
  flex: 1;
}

.progress-bar-custom {
  flex: 1;
  height: 6px;
  background-color: #e9ecef;
  border-radius: 3px;
  overflow: hidden;
}

.progress-fill {
  height: 100%;
  background-color: #28a745;
  transition: width 0.3s ease;
}

.progress-text {
  font-weight: 600;
  color: #2d3436;
  min-width: 40px;
}

.amenities-section {
  margin-bottom: 20px;
}

.amenities-section h4 {
  font-size: 16px;
  font-weight: 700;
  color: #2d3436;
  margin-bottom: 12px;
}

.amenity-category {
  font-size: 1rem;
  font-weight: 600;
  color: #333;
  margin-top: 1.5rem;
  margin-bottom: 0.5rem;
}

.amenity-list {
  list-style-type: disc;
  padding-left: 1.5rem;
  margin-bottom: 1rem;
}

.amenity-list li {
  color: #666;
  font-size: 0.95rem;
  margin-bottom: 0.5rem;
  line-height: 1.4;
}

.property-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 20px;
  border-top: 1px solid #e9ecef;
}

.property-price {
  font-size: 20px;
  font-weight: 700;
  color: #2d3436;
}

.property-actions {
  display: flex;
  gap: 10px;
}

.action-btn {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: none;
  background-color: #f8f9fa;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
}

.action-btn:hover {
  background-color: #0066cc;
  color: white;
}

.action-btn i {
  font-size: 16px;
}

@media (max-width: 768px) {
  .property-image-wrapper,
  .property-slider .swiper-slide {
    height: 250px;
  }
  
  .property-title {
    font-size: 18px;
  }
  
  .amenities-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<!--===== HERO AREA STARTS =======-->
<div class="inner-header-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="page-title">Our Properties</h1>
      </div>
    </div>
  </div>
</div>
<!--===== HERO AREA ENDS =======-->

<div class="properties-page">
  <div class="container">
    <div class="row">
      
      <!-- Property Card 1 - Arrjavv Hazelburg -->
      <div class="col-lg-6 col-xl-4" style="margin-bottom: 30px;">
        <div class="property-card">
          <div class="property-image-wrapper">
            
            <div class="property-slider swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="assets/img/properties/property1/1.png" alt="Banquet Hall">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property1/2.png" alt="AV Room">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property1/3.png" alt="Brauhaus Cafe">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property1/6.jpg" alt="Guest Rooms">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property1/7.jpg" alt="AC Gymnasium">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property1/8.jpg" alt="Library">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          
          <div class="property-content">
            <h3 class="property-title">Arrjavv Hazelburg</h3>
            
            <div class="property-description">
              Experiencing German country life in Kolkata is no longer a fantasy but a reality. Arrjavv Hazelburg brings the subtle charms of Germany to the City of Joy, making it an experience to cherish for a lifetime. Situated in the heart of Diamond Harbor, come home to a pleasant, pastoral German lifestyle that makes you yearn to experience Deutschland in every nook and corner. In the attempt to go beyond luxury bungalow living, we at Arrjavv attempt to pay attention to minute details through stunning architecture and amenities that highlight the old-world charm with a new-age touch. Come home to Arrjavv Hazelburg and find yourself seated in Deutschland itself as it becomes a part of your daily life in the City of Joy.
            </div>
            
            
            
            <div class="amenities-section">
              <h4>Amenities</h4>
              <div class="amenities-grid">
                <div class="amenity-item">
                  <i class="fas fa-check"></i>
                  <span>Banquet hall</span>
                </div>
                <div class="amenity-item">
                  <i class="fas fa-check"></i>
                  <span>AV room</span>
                </div>
                <div class="amenity-item">
                  <i class="fas fa-check"></i>
                  <span>Brauhaus Cafe</span>
                </div>
                <div class="amenity-item">
                  <i class="fas fa-check"></i>
                  <span>Guest rooms</span>
                </div>
                <div class="amenity-item">
                  <i class="fas fa-check"></i>
                  <span>AC gymnasium</span>
                </div>
                <div class="amenity-item">
                  <i class="fas fa-check"></i>
                  <span>Library</span>
                </div>
                <div class="amenity-item">
                  <i class="fas fa-check"></i>
                  <span>Steam room/sauna</span>
                </div>
                <div class="amenity-item">
                  <i class="fas fa-check"></i>
                  <span>Lounge</span>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>

  

      <!-- Property Card 3 - Nidhara -->
      <div class="col-lg-6 col-xl-4" style="margin-bottom: 30px;">
        <div class="property-card">
          <div class="property-image-wrapper">
            <div class="property-slider swiper">
              <div class="swiper-wrapper">
                <!-- Add Nidhara images here -->
                <div class="swiper-slide">
                  <img src="assets/img/properties/property5/1.jpg" alt="Nidhara Exterior">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property5/2.jpg" alt="Nidhara Green Spaces">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property5/3.jpg" alt="Nidhara Entrance">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property5/4.jpg" alt="Nidhara Entrance">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property5/5.png" alt="Nidhara Entrance">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          
          <div class="property-content">
            <h3 class="property-title">Nidhara</h3>
            
            <div class="property-description">
              <p>Welcome to Nidhara, where luxury meets nature in perfect harmony. Experience the epitome of exclusive living with thoughtfully designed spaces and premium amenities.</p>
            </div>
            
            <div class="amenities-section">
              <h4 class="mb-3">Key Features</h4>
              <ul class="amenity-list">
                <li>Expansive 23,338 sq. ft. of verdant green spaces</li>
                <li>Elegant 3-tier landscaping complemented by premium amenities</li>
                <li>Well-ventilated apartments with three open sides</li>
                <li>Exclusive living with only 2 apartments per floor in select towers</li>
                <li>Grand double-height entrance with a spacious, welcoming lobby</li>
                <li>Generous floor-to-floor height of 3.5 meters for enhanced openness</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
     

      <!-- Property Card 4 - Premium Amenities Property -->
      <div class="col-lg-6 col-xl-4" style="margin-bottom: 30px;">
        <div class="property-card">
          <div class="property-image-wrapper">
            <div class="property-slider swiper">
              <div class="swiper-wrapper">
                <!-- Add your property3 images here -->
                <div class="swiper-slide">
                  <img src="assets/img/properties/property3/1.png" alt="Musical Fountain Lake">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property3/2.png" alt="Infinity Pool">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property3/3.png" alt="Club House">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property3/4.png" alt="Sports Facilities">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property3/5.png" alt="Garden View">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          
          <div class="property-content">
            <h3 class="property-title">Emami Amod</h3>
            
            <div class="property-description">
              Experience luxury living at its finest with our comprehensive range of premium amenities. From the mesmerizing musical fountain lake to the breathtaking 180-degree panoramic infinity edge pool, every detail is crafted for an exceptional lifestyle.
            </div>
            
            <div class="amenities-section">
              <h4 class="mb-3">Amenities</h4>
              
              <!-- Amusement & Premium -->
              <h5 class="amenity-category">Amusement & Premium Facilities:</h5>
              <ul class="amenity-list">
                <li>Musical Fountain Lake</li>
                <li>180 Degree panoramic view infinity edge pool</li>
                <li>Amphitheatre</li>
              </ul>

              <!-- Lifestyle -->
              <h5 class="amenity-category">Lifestyle:</h5>
              <ul class="amenity-list">
                <li>Premium Club House</li>
                <li>Bar Lounge Facing Lake</li>
                <li>Banquet Hall</li>
                <li>Steam / Spa</li>
                <li>Lavish Club Lobby Sit-Out</li>
              </ul>

              <!-- Green Zones -->
              <h5 class="amenity-category">Green Zones and Decks:</h5>
              <ul class="amenity-list">
                <li>Kids Play Area</li>
                <li>Sculpture Garden</li>
                <li>Deck with Tensile Canopy</li>
                <li>Topiary Garden</li>
                <li>Pet Relief Area</li>
                <li>Event Garden</li>
                <li>Reflexology</li>
                <li>Parterre Garden</li>
                <li>Fragrance Garden</li>
                <li>Senior Citizen Park</li>
                <li>Palm Court</li>
              </ul>

              <!-- Sports & Fitness -->
              <h5 class="amenity-category">Sports & Fitness Activities:</h5>
              <ul class="amenity-list">
                <li>Pickleball court</li>
                <li>Squash court</li>
                <li>Gymnasium</li>
                <li>Aerobics / Pilates Ring</li>
                <li>Cricket Net</li>
                <li>Basketball court</li>
                <li>Walkway</li>
              </ul>

              <!-- Multipurpose Sports -->
              <h5 class="amenity-category">Multipurpose Sports:</h5>
              <ul class="amenity-list">
                <li>Chess, Carrom etc</li>
                <li>Table Tennis</li>
                <li>Snooker</li>
              </ul>

              <!-- Security -->
              <h5 class="amenity-category">Security:</h5>
              <ul class="amenity-list">
                <li>10-Tier Security</li>
                <li>Entry Gate with Guard Rooms</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

       <!-- Property Card 2 - Srijan Industrial Logistic Park -->
      <div class="col-lg-6 col-xl-4" style="margin-bottom: 30px;">
        <div class="property-card">
          <div class="property-image-wrapper">
            
            
            <div class="property-slider swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="assets/img/properties/property2/1.png" alt="Srijan Park View 1">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property2/2.png" alt="Srijan Park View 2">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property2/3.png" alt="Srijan Park View 3">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property2/4.png" alt="Srijan Park View 4">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property2/5.png" alt="Srijan Park View 5">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          
          <div class="property-content">
            <h3 class="property-title">DTC Palm Grove</h3>
            
            <div class="property-description">
              DTC Palm Grove offers a thoughtfully curated lifestyle with amenities that cater to both relaxation and recreation. Enjoy a refreshing swim in the pool, break a sweat in the gym, or unwind in the stylish lounge café and AV room. The banquet hall and amphitheatre are perfect for celebrations, while the cycling path, jogging track, and reflexology court promote daily wellness. Kids can explore their own play zone, and the activity lawn, indoor games area, and wall climbing space keep the fun going. Set amidst landscaped gardens, gazebos, and tree-lined walkways, all within a secure gated community, Palm Grove is designed for living life to the fullest.
            </div>
            
            
          </div>
        </div>
      </div>

      
      
               <!-- Property Card 5 - Skyler -->
      <div class="col-lg-6 col-xl-4" style="margin-bottom: 30px;">
        <div class="property-card">
          <div class="property-image-wrapper">
            <div class="property-slider swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="assets/img/properties/property6/1.png" alt="Skyler View" class="img-fluid">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property6/2.png" alt="Skyler Amenities" class="img-fluid">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property6/3.png" alt="Skyler Features" class="img-fluid">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          
          <div class="property-content">
            <h3 class="property-title">Skyler</h3>
            
            <div class="property-description">
              Welcome to Skyler, where modern living meets comprehensive amenities. Experience a lifestyle that combines wellness, recreation, and convenience in one prestigious address.
            </div>
            
            <div class="amenities-section">
              <h4>Amenities</h4>
              
              <!-- Fitness & Wellness -->
              <h5 class="amenity-category">Fitness & Wellness:</h5>
              <ul class="amenity-list">
                <li>Yoga Lawn</li>
                <li>Fitness Area</li>
                <li>AC Gymnasium</li>
                <li>Jogging Track</li>
              </ul>

              <!-- Recreation & Entertainment -->
              <h5 class="amenity-category">Recreation & Entertainment:</h5>
              <ul class="amenity-list">
                <li>Amphitheatre</li>
                <li>Swimming Pool</li>
                <li>Community Hall</li>
                <li>Seating Cabana</li>
                <li>Skating Rink Area</li>
                <li>Indoor Games Room</li>
                <li>Kids Play Area</li>
                <li>Multi Purpose Court</li>
                <li>Stepping Stone</li>
                <li>Senior Citizen Area</li>
              </ul>

              <!-- Convenience -->
              <h5 class="amenity-category">Convenience:</h5>
              <ul class="amenity-list">
                <li>Retail Store</li>
                <li>Pharmacy Store</li>
              </ul>

              <!-- Security & Management -->
              <h5 class="amenity-category">Security & Management:</h5>
              <ul class="amenity-list">
                <li>24/7 Security</li>
                <li>CCTV Cameras</li>
                <li>Waste Management</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Property Card 6 - Godrej SE7EN -->
      <div class="col-lg-6 col-xl-4" style="margin-bottom: 30px;">
        <div class="property-card">
          <div class="property-image-wrapper">
            <div class="property-slider swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="assets/img/properties/property4/1.png" alt="Godrej SE7EN View 1" class="img-fluid">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property4/2.png" alt="Godrej SE7EN View 2" class="img-fluid">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property4/3.png" alt="Godrej SE7EN View 3" class="img-fluid">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/properties/property4/4.png" alt="Godrej SE7EN View 4" class="img-fluid">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          
          <div class="property-content">
            <h3 class="property-title">Godrej SE7EN</h3>
            
            <div class="property-description">
              Welcome to Elevate at Godrej SE7EN, where you can embrace a life full of comfort and convenience with a host of amenities across three levels: The Rooftop, The Club & Podium, and The Landscape. At Elevate Godrej SE7EN, you will be spoiled with the luxury of having not just everything you need, but also everything you want.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize all property sliders
  document.querySelectorAll('.property-slider').forEach((slider) => {
    new Swiper(slider, {
      loop: true,
      pagination: {
        el: slider.querySelector('.swiper-pagination'),
        clickable: true,
      },
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      speed: 800,
    });
  });

  // Wrap content and add read more link to each property card
  document.querySelectorAll('.property-content').forEach((content) => {
    // Create content wrapper
    const contentWrapper = document.createElement('div');
    contentWrapper.className = 'content-wrapper';
    
    // Move description and amenities into wrapper
    const description = content.querySelector('.property-description');
    const amenities = content.querySelector('.amenities-section');
    
    // Only proceed if we have content to wrap
    if (description || amenities) {
      // Wrap existing content
      if (description) {
        description.parentNode.removeChild(description);
        contentWrapper.appendChild(description);
      }
      if (amenities) {
        amenities.parentNode.removeChild(amenities);
        contentWrapper.appendChild(amenities);
      }
      
      // Add overlay
      const overlay = document.createElement('div');
      overlay.className = 'read-more-overlay';
      contentWrapper.appendChild(overlay);
      
      // Add wrapper to content
      content.appendChild(contentWrapper);
      
      // Add read more link
      const link = document.createElement('a');
      link.className = 'read-more-link';
      link.href = 'javascript:void(0);';
      link.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>';
      content.appendChild(link);
      
      // Add click event
      link.addEventListener('click', function(e) {
        e.preventDefault();
        contentWrapper.classList.toggle('expanded');
        if (contentWrapper.classList.contains('expanded')) {
          link.innerHTML = 'Read Less <i class="fas fa-chevron-up"></i>';
        } else {
          link.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>';
          content.closest('.property-card').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
      });
    }
  });

  // Update column classes for 2-column layout
  document.querySelectorAll('.col-lg-6.col-xl-4').forEach(col => {
    col.className = 'col-lg-6';
  });
});
</script>

<?php include 'footer.php'; ?>