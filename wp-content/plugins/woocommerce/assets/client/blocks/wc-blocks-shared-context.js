(()=>{"use strict";var e={d:(t,r)=>{for(var a in r)e.o(r,a)&&!e.o(t,a)&&Object.defineProperty(t,a,{enumerable:!0,get:r[a]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r:e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}},t={};e.r(t),e.d(t,{InnerBlockLayoutContextProvider:()=>i,ProductDataContextProvider:()=>l,useInnerBlockLayoutContext:()=>o,useProductDataContext:()=>d});const r=window.React,a=window.wp.element,n=(0,a.createContext)({parentName:"",parentClassName:"",isLoading:!1}),o=()=>(0,a.useContext)(n),i=({parentName:e="",parentClassName:t="",isLoading:a=!1,children:o})=>{const i={parentName:e,parentClassName:t,isLoading:a};return(0,r.createElement)(n.Provider,{value:i},o)},c={id:0,name:"",parent:0,type:"simple",variation:"",permalink:"",sku:"",short_description:"",description:"",on_sale:!1,prices:{currency_code:"USD",currency_symbol:"$",currency_minor_unit:2,currency_decimal_separator:".",currency_thousand_separator:",",currency_prefix:"$",currency_suffix:"",price:"0",regular_price:"0",sale_price:"0",price_range:null},price_html:"",average_rating:"0",review_count:0,images:[],categories:[],tags:[],attributes:[],variations:[],has_options:!1,is_purchasable:!1,is_in_stock:!1,is_on_backorder:!1,low_stock_remaining:null,sold_individually:!1,add_to_cart:{text:"Add to basket",description:"Add to basket",url:"",minimum:1,maximum:99,multiple_of:1}},s=(0,a.createContext)({product:c,hasContext:!1,isLoading:!1}),d=()=>(0,a.useContext)(s),l=({product:e=null,children:t,isLoading:a})=>{const n={product:e||c,isLoading:a,hasContext:!0};return(0,r.createElement)(s.Provider,{value:n},a?(0,r.createElement)("div",{className:"is-loading"},t):t)};(this.wc=this.wc||{}).wcBlocksSharedContext=t})();