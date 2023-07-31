<script>
export default {
  name: "CheckoutCart",
};
</script>

<template>
  <div class="checkout-content box-shadow p-30">
    <form action="#">
      <div class="row">
        <!-- billing details -->
        <div class="col-md-6">
          <div class="billing-details pr-10">
            <h6 class="widget-title border-left mb-20">billing details</h6>
            <input type="text" placeholder="Your Name Here..." />
            <input type="text" placeholder="Email address here..." />
            <input type="text" placeholder="Phone here..." />
            <input type="text" placeholder="Company neme here..." />
            <select class="custom-select">
              <option value="defalt">country</option>
              <option value="c-1">Australia</option>
              <option value="c-2">Bangladesh</option>
              <option value="c-3">Unitd States</option>
              <option value="c-4">Unitd Kingdom</option>
            </select>
            <select class="custom-select">
              <option value="defalt">State</option>
              <option value="c-1">Melbourne</option>
              <option value="c-2">Dhaka</option>
              <option value="c-3">New York</option>
              <option value="c-4">London</option>
            </select>
            <select class="custom-select">
              <option value="defalt">Town/City</option>
              <option value="c-1">Victoria</option>
              <option value="c-2">Chittagong</option>
              <option value="c-3">Boston</option>
              <option value="c-4">Cambridge</option>
            </select>
            <textarea
              class="custom-textarea"
              placeholder="Your address here..."
            ></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <!-- our order -->
          <div class="payment-details pl-10 mb-50">
            <h6 class="widget-title border-left mb-20">our order</h6>
            <table>
              <tr>
                <td class="td-title-1">Dummy Product Name x 2</td>
                <td class="td-title-2">$1855.00</td>
              </tr>
              <tr>
                <td class="order-total">Order Total</td>
                <td class="order-total-price">$2425.00</td>
              </tr>
            </table>
          </div>
          <!-- payment-method -->
          <div class="payment-method">
            <h6 class="widget-title border-left mb-20">payment method</h6>
            <div id="accordion">
              <div class="panel">
                <h4 class="payment-title box-shadow">
                  <a
                    data-toggle="collapse"
                    data-parent="#accordion"
                    href="#bank-transfer"
                  >
                    direct bank transfer
                  </a>
                </h4>
                <div id="bank-transfer" class="panel-collapse collapse in">
                  <div class="payment-content">
                    <p>
                      Lorem Ipsum is simply in dummy text of the printing and
                      type setting industry. Lorem Ipsum has been.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- payment-method end -->
          <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">
            place order
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<style scoped lang="scss"></style>
