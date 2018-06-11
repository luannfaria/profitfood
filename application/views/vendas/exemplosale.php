
<style type="text/css">
$primary: #2980b9;
$primary-light: lighten($primary,10%);
$primary-dark: darken($primary,7%);

$secondary: #eeeeee;
$secondary-light: lighten($secondary,10%);
$secondary-dark: darken($secondary, 10%);

$font-family: "Roboto", sans-serif;

@mixin center() {
  align-items: center;
  justify-content: center;
}
body {
  color:#333;
  overflow: hidden;
  width: 100vw;
  height: 100vh;
  background:$primary;
  font-family: $font-family;
}
.register {
  display: grid;
  grid-template-columns: 1fr 2fr;
  height: 100vh;
  width: 100%;
  font-family: $font-family;
  .left {
    border-radius:5px 5px 2px #333;
    display:block;
    position:relative;
    z-index:10;
    .order-window {
      background: $primary;
      height: 35vh;
      overflow-y: scroll;
      border:0;
      padding:0;
      margin:0;
      table {
        width:100%;
        border-collapse: collapse;
        tr {
          display: grid;
          width: 100%;
          // grid-template-areas: "qty item item price";
          grid-template-columns:1fr 4fr 1fr 2fr;
          overflow-x:hidden;
          td {
            border: 0;
            padding: 10px;
          }
          td:nth-child(1) {

          }
          td:nth-child(2)  {
          }
          td:nth-child(3) {
            display: grid;
            justify-content: end;
          }
          td:nth-child(4){
            display:grid;
            justify-content:center;
          }
        }
        tr:nth-child(even){
          background-color:$secondary-light;
        }
        tr:nth-child(odd) {
          background-color: $secondary;
        }
        tr:first-child{
          font-weight:bold;
          background-color:$primary;
          color:$secondary-light;
          position:sticky;
          top:0px;
        }
      }

    }
    .order-total {
      background: $secondary-light;
      height: 10vh;
      font-size: 6vh;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      padding: 0 10px;
    }
    .buttons {
      display: grid;
      height: 55vh;
      grid-template-columns: 1fr 1fr 1fr 1fr;
      grid-template-rows: 1fr 1fr 1fr 1fr;
      background: $secondary-dark;
      button {
        background-color: $secondary;
        padding: 0;
        margin: 0.5px;
        border: 0;
        border-radius: 2px;
      }
      :hover {
        background-color: $secondary-dark;
      }
    }
  }
  .right {
    background-color: $primary;
    position:relative;
    z-index:5;
    .categories {
      display: flex;
      ul {
        flex: 1;
        display: flex;
        margin: 0;
        padding: 0;
        height: 10vh;
        list-style-type: none;
        li {
          flex: 1;
          display: flex;
          @include center();
          a {
            background: $primary-dark;
            flex: 1;
            display: flex;
            @include center();
            height: 10vh;
            color: white;
            text-decoration: none;
          }
          :hover {
            background: $primary;
          }
        }
      }
    }
    .menu-items {
      height: 80vh;
      ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        height: 80vh;
        overflow-y: scroll;
        li {
          height: 20vh;
          background: $secondary;
          margin: 5px;
          display: flex;
          flex-direction:column;
          @include center();
          border-radius: 2px;
          i{
            background:$primary-dark;
          }
          .item{
            font-weight:bold;
          }
          .category{
            font-style:oblique;
          }
        }
        :hover {
          background: $secondary-dark;
        }
      }
    }
    .payment-keys {
      ul {
        display: flex;
        padding: 0;
        margin: 0;
        list-style-type: none;
        height: 10vh;
        background: $primary-dark;
        color: $secondary-light;
        li {
          flex: 1;
          display: flex;
          flex-direction:column;
          @include center();
        }
        :hover {
          background: $primary;
        }
      }
    }
  }
}
</style>


<div class="register">
  <div class="left">
    <div class="order-window">
      <table>
        <tbody>
          <tr>
            <td>#</td>
            <td>Item</td>
            <td>Price</td>
            <td>GL</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Spaghetti</td>
            <td>$9.50</td>
            <td>EN</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Side Salad</td>
            <td>$4.00</td>
            <td>SS</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Hamburger</td>
            <td>$7.00</td>
            <td>EN</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Chicken Alfredo</td>
            <td>$12.00</td>
            <td>EN</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Soda</td>
            <td>$2.00</td>
            <td>BV</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Iced tea</td>
            <td>$1.50</td>
            <td>BV</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="order-total">
      <span>$38.00</span>
    </div>
    <div class="buttons">

      <button>
        <i class="fas fa-print"></i>
        Print
      </button>
      <button>1</button>
      <button>2</button>
      <button>3</button>
      <button>
        <i class="fas fa-ban"></i>
        Void
      </button>
      <button>4</button>
      <button>5</button>
      <button>6</button>
      <button><i class="fa fa-times"></i>
        QTY
      </button>
      <button>7</button>
      <button>8</button>
      <button>9</button>
      <button>
        <i class="fas fa-sign-out-alt"></i>
          Exit
      </button>
      <div></div>
      <button>0</button>
      <button>.00</button>
    </div>
  </div>
  <div class="right">
    <div class="categories">
      <ul>
        <li><a href="#">All Items</a></li>
        <li><a href="#">Beverages</a></li>
        <li><a href="#">Soup/Salad</a></li>
        <li><a href="#">Appetizers</a></li>
        <li><a href="#">Entrees</a></li>
        <li><a href="#">Desserts</a></li>
      </ul>
    </div>
    <div class="menu-items">
      <ul>
        <li>
<!--           <i class="fas fa-beer fa-2x  fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Water</span>
          <span class="category">Beverages</span>
        </li>
        <li>
<!--           <i class="fas fa-beer fa-2x  fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Iced Tea</span>
          <span class="category">Beverages</span>
        </li>
        <li>
<!--           <i class="fas fa-beer fa-2x  fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Soda</span>
          <span class="category">Beverages</span>
        </li>
        <li>
<!--           <i class="fas fa-beer fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Coffee</span>
          <span class="category">Beverages</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">House Salad</span>
          <span class="category">Soup/Salad</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Side Salad</span>
          <span class="category">Soup/Salad</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Spaghetti</span>
          <span class="category">Entree</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Chicken Alfredo</span>
          <span class="category">Entree</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Hamburger</span>
          <span class="category">Entree</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Cheeseburger</span>
          <span class="category">Entree</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Mozzarella Sticks</span>
          <span class="category">Appetizers</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Nachos</span>
          <span class="category">Appetizers</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Chocolate Cake</span>
          <span class="category">Desserts</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Apple Pie</span>
          <span class="category">Desserts</span>
        </li>
        <li>
<!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
          <span class="item">Blueberry Cobbler</span>
          <span class="category">Entree</span>
        </li>

      </ul>
    </div>
    <div class="payment-keys">
      <ul>
        <li>
          <i class="fas fa-money-bill-alt fa-2x fa-fw" data-fa-transform="up-2"></i> Cash
        </li>
        <li>
          <i class="fas fa-check-square fa-2x fa-fw" data-fa-transform="up-2"></i> Check
        </li>
        <li>
          <i class="fas fa-credit-card fa-2x fa-fw" data-fa-transform="up-2"></i> Credit / Debit
        </li>
        <li>
          <i class="fas fa-gift fa-2x fa-fw" data-fa-transform="up-2"></i> Gift Card
        </li>
        <li>
          <i class="fas fa-user fa-2x fa-fw" data-fa-transform="up-2"></i> Employee Charge
        </li>
      </ul>
    </div>
  </div>
</div>
