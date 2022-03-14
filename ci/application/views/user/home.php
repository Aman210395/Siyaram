
         <!-- end header section -->
         <!-- slider section -->
         <?php $this->load->view("user/slider") ?>
         <!-- end slider section -->
      </div>
      <!-- why section -->
      
      <!-- end why section -->
      
      <!-- arrival section -->
     
      <!-- end arrival section -->
      
      
      <section class="product_section layout_padding" style="min-height: 600px;">
         <div class="container">
            <?php
            foreach($result->result_array() as $data)
            {
            ?>
            <div class="col-md-10 offset-md-1 mb-4" style="border-bottom: 2px solid #000;">
               <div class="row">
                  <div class="col-md-3">
                     <img src="<?= base_url('assets/blog_img/'.$data['image']) ?>" height="200" class="img-thumbnail" />
                  </div>
                  <div class="col-md-9">
                     <h4><?= $data['title'] ?></h4>
                     <h6><?= $data['category']?></h6>
                     <p>
                        <?= $data['detail'] ?>
                     </p>
                  </div>
               </div>
            </div>
            <?php } ?>
            
         </div>
      </section>
      