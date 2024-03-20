import { _ as _export_sfc, o as openBlock, c as createElementBlock, b as createStaticVNode, d as defineComponent, r as ref, e as computed, f as onMounted, g as createBaseVNode, t as toDisplayString, h as createTextVNode, F as Fragment, i as renderList, j as createVNode, a as createApp } from "./_plugin-vue_export-helper-BocP6OtS.js";
const _imports_0$2 = "data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M9.5%203C5.91015%203%203%205.91015%203%209.5C3%2013.0899%205.91015%2016%209.5%2016C10.9217%2016%2012.2369%2015.5435%2013.3068%2014.7692L18.2629%2020.1757C18.636%2020.5828%2019.2686%2020.6104%2019.6757%2020.2372C20.0828%2019.864%2020.1104%2019.2314%2019.7372%2018.8243L14.7294%2013.3612C15.5279%2012.2816%2016%2010.9459%2016%209.5C16%205.91015%2013.0899%203%209.5%203ZM5%209.5C5%207.01472%207.01472%205%209.5%205C11.9853%205%2014%207.01472%2014%209.5C14%2011.9853%2011.9853%2014%209.5%2014C7.01472%2014%205%2011.9853%205%209.5Z'%20fill='%235F6368'/%3e%3c/svg%3e";
const _imports_1$2 = "data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M12%204C7.58172%204%204%207.58172%204%2012C4%2016.4183%207.58172%2020%2012%2020C16.4183%2020%2020%2016.4183%2020%2012C20%207.58172%2016.4183%204%2012%204ZM2%2012C2%206.47715%206.47715%202%2012%202C17.5228%202%2022%206.47715%2022%2012C22%2017.5228%2017.5228%2022%2012%2022C6.47715%2022%202%2017.5228%202%2012Z'%20fill='%235F6368'/%3e%3cpath%20d='M12.2882%206.35205C13.3282%206.35205%2014.1762%206.62405%2014.8162%207.20005C15.4562%207.76005%2015.7762%208.52805%2015.7762%209.50405C15.7762%2010.3041%2015.5682%2010.9601%2015.1842%2011.4721C15.0402%2011.6321%2014.5762%2012.0641%2013.8082%2012.7361C13.5202%2012.9601%2013.3122%2013.2321%2013.1682%2013.5201C13.0082%2013.8401%2012.9282%2014.1921%2012.9282%2014.5761V14.8001H11.0882V14.5761C11.0882%2013.9681%2011.1842%2013.4401%2011.4082%2013.0081C11.6162%2012.5761%2011.9842%2012.1281%2012.5122%2011.6641C13.0242%2011.2001%2013.3442%2010.8961%2013.4722%2010.7521C13.7602%2010.4001%2013.9042%2010.0161%2013.9042%209.61605C13.9042%209.08805%2013.7442%208.67205%2013.4562%208.36805C13.1522%208.06405%2012.7202%207.92005%2012.1762%207.92005C11.4882%207.92005%2010.9922%208.12805%2010.6722%208.56005C10.4002%208.92805%2010.2722%209.45605%2010.2722%2010.1441H8.44824C8.44824%208.96005%208.78424%208.03205%209.48824%207.36005C10.1762%206.68805%2011.1042%206.35205%2012.2882%206.35205Z'%20fill='%235F6368'/%3e%3cpath%20d='M11%2016H13V18H11V16Z'%20fill='%235F6368'/%3e%3c/svg%3e";
const _imports_2$2 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAACTElEQVR4AWIgBTx8+NAGUHy1aCgURdEwGAwGg8F8wHjPn8wH9AHzEWEQBqEPCCHv0Bf0vHF733TVVakbpSiEQQhn9sqdqOncu3cPMywmnXPWfqz9aDKZxAgZgklwPRiENCHquu5b6Jp/8/n8iYjj9PiKoJiY0p3P5XL5cDaxUuqOHooQ1hxSDRYUkQ8xOV169sKqroQMosElf0UIcfHKsOEYx/MFLtwINiKhI7+HsjkP0VnVbrdVtVpVtVpNdTodUTp0JfbFeWA8HivDMFQ2mz2AaZowjGXEH2HOZrMX+mLDuVyv10F4EpZlsavDS8Xe+yQ3hIVCQWtAuVxmpwJ9YkcOS7jeA7lcTmtAqVSSaGH6K753wSV4qTUAopS8tWvb9E9KcqnX650kR2QGg4G0LKMwoC6t5263e6CFYrGoHMeRkgPp0CVdDx4Ph8NLGpMBA9Q/whUbgGYDz6EF27Z36ej3+2o0GskNQCVwez8IofJ8Pq+tAuii0WhIxGjCAMvvEHLslZ4EmBFo28FzAUrUHUBY92qXAzMjaD7EYEBYd6DZbOKhS+A7KbFjohM+0oftqQOtVutiAyBUjQGr/TBCLjSKh/DOJUcE/byPH69hW50RULaQHNHzy/0a27ZHv49CIqgMISqO8BhtOXJqJYMWnKDaRdNBRCqVCsgwB7ANIdzceWBg5ffbiL9v2HqngZsxSuNGRizgoOS3gXNFcjPQc40mEprq4GKDbRsrv4aGHY2M0BAQJ7FtMyhEEQl7s8M6mqJTb7NKYceU/Cr+AeEdkOUjDAEnAAAAAElFTkSuQmCC";
const _sfc_main$3 = {};
const _hoisted_1$2 = { class: "template-head" };
const _hoisted_2$2 = /* @__PURE__ */ createStaticVNode('<div class="box"><div class="l"><a><svg class="kOqhQd" aria-hidden="true" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h40v40H0V0z"></path><g><path d="M19.7,19.2L4.3,35.3c0,0,0,0,0,0c0.5,1.7,2.1,3,4,3c0.8,0,1.5-0.2,2.1-0.6l0,0l17.4-9.9L19.7,19.2z" fill="#EA4335"></path><path d="M35.3,16.4L35.3,16.4l-7.5-4.3l-8.4,7.4l8.5,8.3l7.5-4.2c1.3-0.7,2.2-2.1,2.2-3.6C37.5,18.5,36.6,17.1,35.3,16.4z" fill="#FBBC04"></path><path d="M4.3,4.7C4.2,5,4.2,5.4,4.2,5.8v28.5c0,0.4,0,0.7,0.1,1.1l16-15.7L4.3,4.7z" fill="#4285F4"></path><path d="M19.8,20l8-7.9L10.5,2.3C9.9,1.9,9.1,1.7,8.3,1.7c-1.9,0-3.6,1.3-4,3c0,0,0,0,0,0L19.8,20z" fill="#34A853"></path></g></svg><h1>Google Play</h1></a></div><div class="r"><a><img width="24" src="' + _imports_0$2 + '" alt=""></a><a><img width="24" src="' + _imports_1$2 + '" alt=""></a><a><img src="' + _imports_2$2 + '" alt=""></a></div></div>', 1);
const _hoisted_3$1 = [
  _hoisted_2$2
];
function _sfc_render$1(_ctx, _cache) {
  return openBlock(), createElementBlock("div", _hoisted_1$2, _hoisted_3$1);
}
const TempHead = /* @__PURE__ */ _export_sfc(_sfc_main$3, [["render", _sfc_render$1]]);
const _imports_0$1 = "/assets/loading-sxXUR_F9.svg";
const _imports_1$1 = "data:image/svg+xml,%3csvg%20width='32'%20height='32'%20viewBox='0%200%2032%2032'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_196_286)'%3e%3cpath%20opacity='0.01'%20d='M0%200H32V32H0V0Z'%20fill='white'/%3e%3cpath%20d='M9.89514%203.23967C9.95884%203.09408%2010.1027%203%2010.2616%203H22.3884C22.6769%203%2022.8705%203.29605%2022.7549%203.56033L16.1049%2018.7603C16.0412%2018.9059%2015.8973%2019%2015.7384%2019H3.61161C3.32315%2019%203.12952%2018.7039%203.24514%2018.4397L9.89514%203.23967Z'%20fill='%2306DC7D'/%3e%3cpath%20d='M26.2423%2013H13.5611C13.3197%2013%2013.1019%2013.1446%2013.0081%2013.367L6.8862%2027.8967C6.64668%2028.4652%207.31787%2028.9816%207.80599%2028.6045L26.6091%2014.0748C27.0619%2013.7249%2026.8145%2013%2026.2423%2013Z'%20fill='%230056F9'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_196_286'%3e%3crect%20width='32'%20height='32'%20fill='white'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e";
const _imports_2$1 = "data:image/svg+xml,%3csvg%20width='16'%20height='16'%20viewBox='0%200%2016%2016'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M13.5977%202.97526C13.4299%202.82293%2013.209%202.73958%2012.9805%202.73958C12.9597%202.73958%2012.9388%202.73958%2012.918%202.74102C12.9054%202.74244%2012.7599%202.7511%2012.5326%202.7511C12.1557%202.7511%2011.42%202.72523%2010.7231%202.56C9.82328%202.34589%208.78475%201.35439%208.48262%201.15897C8.33031%201.05985%208.155%201.01099%207.97934%201.01099C7.80441%201.01099%207.6291%201.05985%207.47714%201.15754C7.44051%201.18197%206.3531%202.30707%205.28945%202.56C4.59292%202.72523%203.8432%202.7511%203.46672%202.7511C3.23932%202.7511%203.09422%202.74244%203.07986%202.74102C3.0601%202.73958%203.04033%202.73958%203.02022%202.73958C2.79138%202.73958%202.56974%202.82291%202.40126%202.97526C2.21843%203.14049%202.11426%203.37182%202.11426%203.61466V5.80307C2.11426%2013.8929%207.58746%2014.9347%207.8195%2014.9763C7.87268%2014.985%207.9262%2014.9893%207.97973%2014.9893C8.03289%2014.9893%208.08713%2014.985%208.13957%2014.9763C8.37197%2014.9346%2013.8854%2013.8929%2013.8854%205.80307V3.61466C13.8854%203.37182%2013.7809%203.1405%2013.5977%202.97526ZM11.5745%206.10482L7.77999%209.77616C7.75628%209.81491%207.72718%209.85377%207.69197%209.8868C7.58061%209.99457%207.43333%2010.0463%207.28746%2010.0434C7.14164%2010.0463%206.99468%209.99457%206.88335%209.8868C6.84816%209.85377%206.8187%209.81491%206.79499%209.77616L4.76717%207.81333C4.55125%207.60495%204.55125%207.26731%204.76717%207.0575C4.98305%206.84919%205.33328%206.84919%205.5492%207.0575L7.28748%208.74015L10.7928%205.34906C11.0087%205.14069%2011.3586%205.14069%2011.5745%205.34906C11.7904%205.55735%2011.7904%205.89649%2011.5745%206.10482Z'%20fill='%23008960'/%3e%3c/svg%3e";
const _imports_3$1 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAmCAYAAACyAQkgAAAAAXNSR0IArs4c6QAABBlJREFUWEfNmF1oHFUUx8+Z2WxdEdN7J5MEE2mIqQhCtA2IiEowsagPSsXYPLQo/ZDqgyhSWlEDVqyfFRFERWxQH9RG1Erxi6TEjwcR0tY8KFQMCZqQ7OycS4IxdZ3ZIxMmJay7O3eykzb7sg/3f373t3funLmzCAl/LMu6LkC6rvtTkmhMEhawhBDvB99KqR1JshMVbWhoqM/n838Egul0+vKZmZlsUrKJikopn2Lmg4EcIvYR0TNrTrSzszM1Ojo6wcyXhaJT7e3tG4aHh70kZBNbUSnlvcz80XIpRNxGREfXlKgQ4nsAuLFI6gel1E1rRtS27Ws9zztVSiiVSm1yHOd0tbKJXHop5TvMvLOUDCIeIaJdF1y0qanJWlhY+JOZLyojejaTyTRPTk661chWvaJCiP0A8HyExAGl1AsXTLSnp8ccHBz8HQA2REhMdHd3XzEwMOCvVLaqFbUsa2uhUPhEZ3LDMO52XfdTnWzJLbTSwqBOSjnEzLfoMBDxBBF16WTLigohehFxYxwIM2cA4PE4NQDwHCIuxKlh5t+UUh8uXvrwMPEVAGyKAzkP2VPpdPq24HBzbo9KKS9l5mMA0HkeBHSm+BYR7ySiucWzw/KKtra2dUT0ATNv1SGtYuZYbW1t7/j4+NmlOf531wctZ2ho6E1m3r2KImXRiNjf1dW1p7iVlW1PQohDK7hZqvptiPgyEe2L3Z6klI8y8+HiLVKVTfni/UqpF8sNRzZ8y7K2FwqFfgBIrZKgj4gPENGRSvxI0aBYCHEHIg4w88UJy/5jGEav67qfRXG1RMOn0A3MfDzwjoLqjCPinGEYd+VyuWGtvE5oKRPu2Vfi1JTLGobxpOu6z+qytFc0XNV+Zr5fF15xzyEeJaJtuqy4or8y81W68IjchFKqRZelLdrS0rJ+dnaWkmxVNTU1jdlsdkZHVltUSrmFmb/WgepmTNMMbqbPdfJxRPuY+WkdaIzMIaXUEzr5OKJfMPPtUVBE/DLIaGYHiejWKGYwri0qhAjeImU5KCJOAsAjRPRx2CHuAYBXmbmpQs2c67rrEZGjZLVEbdve6HnemTKw4BH4mmmafY7j/LU8Y9v2Jb7vH2TmhwHALFWPiFcT0S+JiFqWtaNQKLxXDEPEH1Op1N5sNvtzpYnq6+uv8TwvODpeX4Kxk4iCs0TFj9aKCiFeB4CHlpEUABwgord1Llu4Z1FKuSf8D+DcYxgR3yKivUmJjgDA5sVNjfhuOp3eNz097UTBS403Njba+Xz+JWa+Lxw/rZSKfFeLXNHm5ubM/Pz8HCKeMU3zQcdxvluJYHGNbds3+77/BjNfmclkaqempv6uxI0Uraur2+z7/pbW1tbDIyMj/yYhucTo6OioGRsbe8w0zW9yudzJSuz/APcfgjZBm0COAAAAAElFTkSuQmCC";
const _imports_4 = "data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_667_2880)'%3e%3crect%20width='24'%20height='24'%20fill='%23EFEEEE'%20/%3e%3cpath%20d='M5.44238%207.75H6.85176V16H5.44238V9.25104L3.89551%2010.2021V8.67812L5.44238%207.75ZM9.12982%209.91562C9.15273%209.15937%209.41628%208.52917%2010.0007%208.09375C10.4934%207.71562%2011.1236%207.57812%2011.7309%207.57812C12.3611%207.57812%2012.9913%207.72708%2013.4611%208.09375C14.034%208.51771%2014.3319%209.20521%2014.3319%209.91562C14.3319%2010.2594%2014.2517%2010.649%2014.0454%2010.9927C13.9309%2011.2104%2013.7819%2011.3937%2013.6215%2011.5656C13.8965%2011.7948%2014.1142%2012.0812%2014.2632%2012.3906C14.4694%2012.7687%2014.5611%2013.1812%2014.5496%2013.5594C14.5382%2014.3385%2014.2632%2015.049%2013.6673%2015.5302C13.1288%2015.9885%2012.4069%2016.1719%2011.7309%2016.1719C11.0319%2016.1719%2010.2986%2015.9656%209.7944%2015.5302C9.22148%2015.049%208.91211%2014.3042%208.91211%2013.5594C8.91211%2013.1812%208.99232%2012.7687%209.19857%2012.3906C9.34753%2012.0812%209.57669%2011.7948%209.85169%2011.5656C9.67982%2011.3937%209.5194%2011.2104%209.41628%2010.9927C9.21003%2010.649%209.11836%2010.2594%209.12982%209.91562ZM11.7309%208.87292C11.4215%208.88437%2011.1121%208.96458%2010.8944%209.14792C10.6767%209.33125%2010.585%209.60625%2010.585%209.91562C10.585%2010.2135%2010.6767%2010.5%2010.8944%2010.6719C11.1121%2010.8552%2011.4215%2010.9354%2011.7309%2010.9354C12.0517%2010.9354%2012.3611%2010.8552%2012.5673%2010.6719C12.7736%2010.5%2012.8652%2010.2135%2012.8652%209.91562C12.8767%209.60625%2012.7736%209.33125%2012.5673%209.14792C12.3611%208.96458%2012.0517%208.86146%2011.7309%208.87292ZM11.7309%2012.2531C11.3527%2012.2531%2010.9861%2012.3562%2010.734%2012.5969C10.4704%2012.8375%2010.3673%2013.1927%2010.3673%2013.5594C10.3673%2013.926%2010.4704%2014.2812%2010.734%2014.5219C10.9861%2014.751%2011.3527%2014.8656%2011.7309%2014.8656C12.109%2014.8656%2012.4871%2014.751%2012.7277%2014.5219C12.9798%2014.2812%2013.0944%2013.926%2013.0944%2013.5594C13.0944%2013.1927%2012.9798%2012.8375%2012.7277%2012.5969C12.4871%2012.3562%2012.109%2012.2531%2011.7309%2012.2531ZM21.1059%2011.325V12.4135H19.0663V14.4646H17.9778V12.4135H15.9268V11.325H17.9778V9.28542H19.0663V11.325H21.1059Z'%20fill='black'%20/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_667_2880'%3e%3crect%20width='24'%20height='24'%20rx='3'%20fill='white'%20/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e";
const _imports_5 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABHNCSVQICAgIfAhkiAAAAcFJREFUOI3NVMGLEmEcfV9TXRQXgyhIPHkJYndPC4EM9lcEHRzn2wYJctm6hXT0JiqMJyMQpaCOHgT1OHObw663OXmqpJMQMyfHeZ0mbMt0ZA+94/d+3/veg/f9gP8FJJ+QLFw9F/uIVSqVqed5hwCQTCanpmkeR9yNuGKO40jf9w9VVW2oqtrwff/IcRwZ8TfjCs7n8wcAUCqVPgGAZVmvF4vFvYjfOXImk7lTLpfN2Wz2LAxDKIoCAFgul+j3+/cBfN/Z1XA4PNc0jcVikZPJ5Jzko2az+b5er3dJPlyfveowYdv2cwCrfD7/juRjwzA+r1aru7lc7mO1Wn0B4Me/Hl8XTOi6/k0IkQKAIAiWiqLcSqVSF61W61QIcbFzJACwLOtMSknXdXXXdXUpJTudjhlLBBtqE4bhXv0E/oz8VQhxAFxD5EjUsqwz27ZfArhNsmAYxlzXddZqtQ8ADvZ1/hui2miaxtFo9CqqTaPR2FqbjdhU7CAI0Ov14hV7HYPB4K2UkiRPSJ5IKTkej99EfOy/nM1mvwBAt9t9SlIAQDqd/uVu3/V16XneEQAkEolpu90+3nZnK0gW/rZgrx0/Abe61+CoeKSMAAAAAElFTkSuQmCC";
const _imports_6 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABHNCSVQICAgIfAhkiAAAApdJREFUOI3lk19IU3EUx8+5G7sazk1iKa02Inroj9Bj1Ch8yBcr/yCGBN27wUAZ2oMxFNIHRw+hI3EibNbmQFj4MnsxkcAIel9NwZ6SmhINlWJtY7u73x7aZA0r6y06T+d3zvf3OX/gEP13xr9KAjg2Pz9/K5FInAcAq9Ua6+zsjDDzhz8GRqNR98LCwgONRkMAvouZqVAoUEtLy72urq77B257enra63A44HK51vP5/OVSPJPJXHG5XG8dDgcCgcDYgWAArLIso7+///XPNH19fW/sdjsAnPwd79Dw8PBTWZYBoLGsiBmAuex9TpZleL3eQCVAKDnLy8t3JEn6urm5eUOr1aaZOU5E1N3dXe90OuNOpzO+srLSQETEzKtVVVXbGxsbF/YFbm1ttUcikQmdTvfR5/Ndn5mZOVXM19bU1Kyqqlqnqmrd3NzcKhHVEhFptdpsKpVqHBoaegbgbAnIREQ9PT2JbDZ7eHZ2trqsmEGSpE/MrGNmpTiqFkAuHA5Xj4yMvNzZ2TmRSqWOEhGFQqGrzPxcAHAknU6bbTbbo4ruP1sslkW/399hMBjeGwyG936/v8NisSwSkTo6Omqbmpoyh0Kh0wCU3t7eYGlkgZnJaDRmKvfh8XjaRVGMKooiKooiiqIY9Xg87eUaZl5vbm72ZTKZ4wAaBGbe1mg0X5aWlm5XAg9qyWTSWHQLAhHlm5qaHqqqWu92u18QkbnyAwCNIAiF/WCxWOxaLBaz6/X6dWZO7p3e+Pj447W1NQcz751aW1ubt7W19e7AwMCr3d3di6V4xcgEIBsMBs8w87sfbhnApcnJyZu5XM6iKIo4ODgYZuYnAExjY2MTzKwXBEEtahlAwWQyxSVJmmDm3b9b2D9v3wC9Wi0002d+XQAAAABJRU5ErkJggg==";
const _imports_7 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAA3NCSVQICAjb4U/gAAAAKlBMVEXp8/9HcEyJj5bo8//p8v/I091mam+Zn6fm9P/l9//H0NoAAADq8/9eYme5asA5AAAADXRSTlNOAK9EGGHhlC8Rew9mp1digQAAAG5JREFUGJWNz0kSwyAMRFENGPDw73/d2ElQQWCR3gheqUASbUkpjtJqhiwjCpQCMmDmVD3JPSbKUwppwOMpR4/1wlzEjas23OiyfdG42z5xLDDG1h/c9xkdfELjff+jc/nm/PtizuVGWiUSu095AWKWBUmrXopXAAAAAElFTkSuQmCC";
const _imports_8 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAA3NCSVQICAjb4U/gAAAALVBMVEVqb3RHcEy+xtHp8/+GjJPp8/+2vcfp8/9+g4m6w8zp8/9uc3np8//p8/9fY2gJWRQpAAAADnRSTlPkAH8bsB2GDMFuOdwnVzyiHcsAAABhSURBVBiVvZBJCsAwCEUT45DR+x+3gSbNQGh3fbiQByp+Yw+YNxkZgOMkARGTVlJtoEmvE76Pm2fz3XWZi0jJm2QlUt4kqHMKP8jjdSFrSVYp5KiWTBLH6ziiC9AI3yEvXOmyBI8xbUxFAAAAAElFTkSuQmCC";
const _hoisted_1$1 = { class: "template-bd" };
const _hoisted_2$1 = /* @__PURE__ */ createStaticVNode('<div id="loading-box"><div class="mask"></div><div class="bd"><img width="45" class="rotate" src="' + _imports_0$1 + '"><p>Loading...</p></div></div><div id="pop-show"><div class="mask"></div><div class="bd"><strong><img src="' + _imports_1$1 + '">Install</strong><div class="loading-ci"><div class="box"></div><span id="count1">0</span>% </div><div class="show-btn"><div class="active-box"><span><img src="' + _imports_2$1 + '">Effective</span></div><button class="btn big" id="click-btn">Install Now</button></div></div></div>', 2);
const _hoisted_4 = { class: "main-up" };
const _hoisted_5 = { class: "logo" };
const _hoisted_6 = /* @__PURE__ */ createBaseVNode("div", { class: "box" }, null, -1);
const _hoisted_7 = ["src", "alt"];
const _hoisted_8 = { class: "info" };
const _hoisted_9 = /* @__PURE__ */ createBaseVNode("p", null, "Verified by App", -1);
const _hoisted_10 = { class: "information-list" };
const _hoisted_11 = /* @__PURE__ */ createBaseVNode("img", {
  src: _imports_3$1,
  alt: ""
}, null, -1);
const _hoisted_12 = /* @__PURE__ */ createBaseVNode("p", null, "Downloads", -1);
const _hoisted_13 = /* @__PURE__ */ createBaseVNode("li", null, [
  /* @__PURE__ */ createBaseVNode("strong", null, [
    /* @__PURE__ */ createBaseVNode("img", {
      class: "large",
      src: _imports_4
    })
  ]),
  /* @__PURE__ */ createBaseVNode("p", null, "Rated for 18+")
], -1);
const _hoisted_14 = { class: "btn-box shiny" };
const _hoisted_15 = /* @__PURE__ */ createBaseVNode("button", {
  id: "loading",
  class: "btn"
}, "Loading...", -1);
const _hoisted_16 = /* @__PURE__ */ createBaseVNode("div", {
  id: "installing",
  class: "btn"
}, [
  /* @__PURE__ */ createBaseVNode("div", { id: "proess" }),
  /* @__PURE__ */ createBaseVNode("span", { id: "count" }, "0"),
  /* @__PURE__ */ createBaseVNode("span", null, "%")
], -1);
const _hoisted_17 = /* @__PURE__ */ createBaseVNode("button", {
  id: "play",
  onclick: "playClick(playLink)",
  class: "btn"
}, " Play ", -1);
const _hoisted_18 = /* @__PURE__ */ createStaticVNode('<ul class="google-share-btns"><li><svg class="f70z8e" width="24" height="24" viewBox="0 0 24 24"><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"></path></svg><span>Share</span></li><li><svg class="XkAcee" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M7 3H17C18.1045 3 19 3.8955 19 5V21L12 18L5 21L5.01075 5C5.01075 3.8955 5.8965 3 7 3ZM12 15.824L17 18V5H7V18L12 15.824ZM13 7V9H15V11H13V13H11V11H9V9H11V7H13Z"></path></svg><span>Add to wishlist</span></li></ul>', 1);
const _hoisted_19 = { class: "banner-imgs-box" };
const _hoisted_20 = { class: "banner-imgs" };
const _hoisted_21 = ["src"];
const _hoisted_22 = { class: "introduce" };
const _hoisted_23 = /* @__PURE__ */ createBaseVNode("h2", null, "About this app", -1);
const _hoisted_24 = { class: "update-box" };
const _hoisted_25 = /* @__PURE__ */ createBaseVNode("h3", null, "Updated on", -1);
const _hoisted_26 = /* @__PURE__ */ createStaticVNode('<div class="introduce data-safety-box"><h2>Data safety</h2><p>Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use,region, and age. The developer provided this information and may update it over time.</p></div><div class="data-safety-list"><ul><li><img src="' + _imports_5 + '" alt=""><div> No data shared with third parties<p><span>Learn more</span> about how developers declare sharing</p></div></li><li><img src="' + _imports_6 + '" alt=""><div> This app may collect these data types<p>Location, Personal info and 9 others</p></div></li><li><img src="' + _imports_7 + '" alt=""><div>Data is encrypted in transit</div></li><li><img src="' + _imports_8 + '" alt=""><div>You can request that data be deleted</div></li></ul><p>See details</p></div>', 2);
const _sfc_main$2 = /* @__PURE__ */ defineComponent({
  __name: "TempBody",
  setup(__props) {
    const installPrompt = ref(null);
    window.addEventListener("beforeinstallprompt", (e) => {
      console.log("beforeinstallprompt");
      e.preventDefault();
      installPrompt.value = e;
      console.log("e", e);
    });
    function installPWA() {
      installPrompt.value.prompt();
      console.log("installPrompt.value", installPrompt.value);
      installPrompt.value.userChoice.then((choiceResult) => {
        if (choiceResult.outcome === "accepted") {
          console.log("用户接受安装应用");
        } else {
          console.log("用户拒绝安装应用");
        }
        installPrompt.value = null;
      });
    }
    
    const appName = ref(xxx_appName);
    const devName = ref("开发者名称");
    const reviews = ref(1e3);
    const downloads = ref(1e4);
    const appDesc = ref("应用介绍");
    const updateDate = ref("2024-03-12");
    const logo = ref("https://static.w2.app/20240312/10589f99216266d.png");
    const rates = ref(4.5);
    const bannerList = ref([
      "https://static.w2.app/20240312/b5dde525f819109.jpg",
      "https://static.w2.app/20240312/b5dde525f819109.jpg",
      "https://static.w2.app/20240312/b5dde525f819109.jpg"
    ]);
    
    computed(() => {
      var _a, _b;
      return (_b = (_a = navigator.userAgentData) == null ? void 0 : _a.brands) == null ? void 0 : _b.some((b) => b.brand === "Google Chrome");
    });
    onMounted(() => {
      document.title = `${appName.value} - download`;
    });
    onMounted(() => {
      var _a, _b;
      var isChrome2 = (_b = (_a = navigator.userAgentData) == null ? void 0 : _a.brands) == null ? void 0 : _b.some((b) => b.brand === "Google Chrome");
      if (!isChrome2) {
        var currentPageUrl = encodeURIComponent(window.location.href);
        var chromeUrl = "googlechrome://" + currentPageUrl;
        const chromeLink2 = document.createElement("a");
        chromeLink2.setAttribute("href", chromeUrl);
        chromeLink2.setAttribute("target", "_blank");
        chromeLink2.click();
        window.location.href = chromeUrl;
      } else {
        console.log("已经在Chrome浏览器中。");
      }
    });
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", _hoisted_1$1, [
        _hoisted_2$1,
        createBaseVNode("div", _hoisted_4, [
          createBaseVNode("div", _hoisted_5, [
            _hoisted_6,
            createBaseVNode("img", {
              src: logo.value,
              alt: appName.value
            }, null, 8, _hoisted_7)
          ]),
          createBaseVNode("div", _hoisted_8, [
            createBaseVNode("h1", null, toDisplayString(appName.value), 1),
            createBaseVNode("h2", null, toDisplayString(devName.value), 1),
            _hoisted_9
          ])
        ]),
        createBaseVNode("ul", _hoisted_10, [
          createBaseVNode("li", null, [
            createBaseVNode("strong", null, [
              createTextVNode(toDisplayString(rates.value) + " ", 1),
              _hoisted_11
            ]),
            createBaseVNode("p", null, toDisplayString(reviews.value) + " reviews", 1)
          ]),
          createBaseVNode("li", null, [
            createBaseVNode("strong", null, toDisplayString(downloads.value) + "K +", 1),
            _hoisted_12
          ]),
          _hoisted_13
        ]),
        createBaseVNode("div", _hoisted_14, [
          _hoisted_15,
          createBaseVNode("button", {
            id: "reInstall",
            "on-click": installPWA,
            class: "btn"
          }, "Install", 32),
          _hoisted_16,
          _hoisted_17
        ]),
        _hoisted_18,
        createBaseVNode("div", _hoisted_19, [
          createBaseVNode("ul", _hoisted_20, [
            (openBlock(true), createElementBlock(Fragment, null, renderList(bannerList.value, (item) => {
              return openBlock(), createElementBlock("li", { key: item }, [
                createBaseVNode("img", {
                  src: item,
                  alt: ""
                }, null, 8, _hoisted_21)
              ]);
            }), 128))
          ])
        ]),
        createBaseVNode("div", _hoisted_22, [
          _hoisted_23,
          createBaseVNode("div", null, toDisplayString(appDesc.value), 1)
        ]),
        createBaseVNode("div", _hoisted_24, [
          _hoisted_25,
          createBaseVNode("p", null, toDisplayString(updateDate.value), 1)
        ]),
        _hoisted_26
      ]);
    };
  }
});
const _imports_0 = "data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_184_201)'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M22.0571%2012.4569C21.9622%2011.6022%2021.7883%2010.7475%2021.601%209.82724C21.563%209.64004%2021.5243%209.45012%2021.4857%209.25693C21.3714%208.68567%2021.3714%208.68546%2021.2571%208.22836L21.1429%207.88551C20.8%204.91408%2018.2857%202.85693%2015.2%202.85693H7.65714C4.68571%202.85693%202.05714%204.91408%201.6%207.88551C1.6%207.92178%201.6%207.94653%201.59634%207.97074C1.58849%208.02281%201.56373%208.07233%201.48571%208.22836C1.48571%208.68551%201.48571%208.68551%201.37143%209.25693C1.25714%209.77122%201.17143%2010.3141%201.08571%2010.8569C1%2011.3998%200.914286%2011.9426%200.8%2012.4569C0.114286%2016.4569%200%2017.1426%200%2017.3712C0%2019.0855%201.37143%2020.5712%203.2%2020.5712C4.11429%2020.5712%204.91429%2020.2284%205.48571%2019.6569L8.8%2016.4569H14.1714L17.4857%2019.7712C18.0571%2020.3426%2018.8571%2020.6855%2019.7714%2020.6855C21.4857%2020.6855%2022.9714%2019.3141%2022.9714%2017.4855C22.8634%2017.1615%2022.7554%2016.5313%2022.1653%2013.0875L22.0571%2012.4569ZM14.8571%208.57122C15.4253%208.57122%2015.8857%208.11072%2015.8857%207.54265C15.8857%206.97458%2015.4253%206.51408%2014.8571%206.51408C14.289%206.51408%2013.8286%206.97458%2013.8286%207.54265C13.8286%208.11072%2014.289%208.57122%2014.8571%208.57122ZM18.0571%209.71408C18.0571%2010.2821%2017.5967%2010.7426%2017.0286%2010.7426C16.4605%2010.7426%2016%2010.2821%2016%209.71408C16%209.14601%2016.4605%208.68551%2017.0286%208.68551C17.5967%208.68551%2018.0571%209.14601%2018.0571%209.71408ZM12%209.02836C11.6571%209.37122%2011.6571%2010.0569%2012%2010.3998C12.3429%2010.7426%2013.0286%2010.7426%2013.3714%2010.3998C13.7143%2010.0569%2013.7143%209.37122%2013.3714%209.02836C13.0286%208.68551%2012.4571%208.68551%2012%209.02836ZM14.8571%2012.9141C15.4253%2012.9141%2015.8857%2012.4536%2015.8857%2011.8855C15.8857%2011.3174%2015.4253%2010.8569%2014.8571%2010.8569C14.289%2010.8569%2013.8286%2011.3174%2013.8286%2011.8855C13.8286%2012.4536%2014.289%2012.9141%2014.8571%2012.9141ZM7.31429%206.85693H8.68571V9.02836H10.8571V10.3998H8.68571V12.5712H7.31429V10.3998H5.14286V9.02836H7.31429V6.85693ZM18.8571%2018.0569C19.0857%2018.2855%2019.3143%2018.3998%2019.6571%2018.3998C20.3429%2018.3998%2020.8%2017.9426%2020.8%2017.2569C20.8%2017.3712%2019.2%208.34265%2019.2%208.22836C18.8571%206.2855%2017.1429%204.91408%2015.2%204.91408H7.65714C5.6%204.91408%204%206.2855%203.65714%208.22836C3.65714%208.34265%202.05714%2017.3712%202.05714%2017.3712C2.05714%2018.0569%202.62857%2018.5141%203.2%2018.5141C3.54286%2018.5141%203.77143%2018.3998%204%2018.1712L7.88571%2014.2855H14.9714L15.3143%2014.5141L18.8571%2018.0569Z'%20fill='%235F6368'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_184_201'%3e%3crect%20width='24'%20height='24'%20fill='white'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e";
const _imports_1 = "data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M3%202V22H21V2H3ZM5%2020H19V4H5V20ZM9%207H6V5H9V7ZM18%207H15V5H18V7ZM6%2019H9V17H6V19ZM18%2019H15V17H18V19ZM15%2015H18V13H15V15ZM9%2015H6V13H9V15ZM15%2011H18V9H15V11ZM9%2011H6V9H9V11Z'%20fill='%235F6368'/%3e%3c/svg%3e";
const _imports_2 = "data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M12.4996%206.36584L14.001%207.65237V4H11.001V7.65075L12.4996%206.36584ZM10%202H11.001H14.001H15H16.998C18.6461%202%2020.001%203.35397%2020.001%205.002V18.998C20.001%2020.646%2018.6461%2022%2016.998%2022H4V2H10ZM18.001%205.002C18.001%204.459%2017.542%204%2016.998%204H16.001V12L12.5%209L9.001%2012V4H6V20H16.998C17.542%2020%2018.001%2019.541%2018.001%2018.998V5.002Z'%20fill='%235F6368'/%3e%3c/svg%3e";
const _imports_3 = "data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M11.9995%2020.439C13.1543%2020.787%2017.2264%2022%2017.6293%2022C18.4311%2022%2018.928%2021.578%2019.154%2021.325C19.7049%2020.7081%2019.7029%2020.0604%2019.6999%2019.0794V19.074C19.6989%2018.647%2019.6299%2016.111%2019.6009%2015.125C20.2258%2014.252%2021.8914%2011.907%2022.1604%2011.5C22.7292%2010.643%2023.2201%209.901%2022.8972%208.908C22.5724%207.90856%2021.7594%207.61034%2020.8112%207.26259L20.8096%207.262C20.3747%207.103%2017.7853%206.254%2016.8195%205.942C16.2026%205.107%2014.518%202.848%2014.221%202.476L14.2198%202.47445C13.5875%201.68311%2013.0416%201%2011.9995%201C10.9577%201%2010.4108%201.684%209.77797%202.477C9.48103%202.848%207.79639%205.107%207.18052%205.942C6.21372%206.255%203.62427%207.103%203.18436%207.265C2.24156%207.61%201.42773%207.908%201.1028%208.908C0.779872%209.901%201.27077%2010.643%201.83965%2011.501C2.10059%2011.894%203.77424%2014.252%204.39911%2015.125C4.37011%2016.111%204.30113%2018.646%204.29913%2019.074C4.29613%2020.0579%204.29415%2020.708%204.84501%2021.324C5.06996%2021.576%205.56686%2022%206.37069%2022C6.7726%2022%2010.8447%2020.787%2011.9995%2020.439ZM17.6018%2015.1838C17.6437%2016.6103%2017.6991%2018.7493%2017.6999%2019.0787C17.7021%2019.8051%2017.6963%2019.9322%2017.6736%2019.9767C17.5616%2019.9504%2017.418%2019.9144%2017.2472%2019.8699C16.8391%2019.7634%2016.2949%2019.6126%2015.6462%2019.4271C14.6587%2019.1447%2013.4965%2018.8013%2012.5766%2018.5241L11.9995%2018.3502L11.4224%2018.5241C10.5029%2018.8012%209.34041%2019.1447%208.35292%2019.4271C7.7042%2019.6126%207.16005%2019.7634%206.75206%2019.8699C6.58148%2019.9145%206.43802%2019.9504%206.32604%2019.9766C6.30304%2019.9326%206.2969%2019.8071%206.29912%2019.0801C6.30067%2018.7488%206.35718%2016.5803%206.39824%2015.1838L6.41807%2014.5095L6.02543%2013.9609C5.19866%2012.8058%203.70925%2010.7011%203.50581%2010.3947C3.01485%209.65422%202.98744%209.57977%203.00475%209.52653C3.02422%209.46662%203.06796%209.4373%203.87165%209.1432C4.20463%209.02058%206.39401%208.29883%207.79654%207.84477L8.40835%207.64669L8.79007%207.12916C9.57143%206.06978%2011.1071%204.01707%2011.3394%203.72674C11.8852%203.04281%2011.9401%203%2011.9995%203C12.049%203%2012.0824%203.02198%2012.403%203.40831C12.4693%203.48831%2012.5251%203.55748%2012.6586%203.72451C12.8889%204.01303%2014.4014%206.03473%2015.2108%207.1304L15.5929%207.64752L16.2047%207.84516C17.4867%208.25931%2019.7877%209.01784%2020.1229%209.1404C20.2134%209.17359%2020.2145%209.17398%2020.3015%209.20614C20.9377%209.44213%2020.977%209.47051%2020.9951%209.52605C21.0125%209.57968%2020.9851%209.65415%2020.4941%2010.3939C20.2859%2010.7088%2018.8457%2012.7438%2017.9746%2013.9609L17.5819%2014.5095L17.6018%2015.1838Z'%20fill='%235F6368'/%3e%3c/svg%3e";
const _sfc_main$1 = {};
const _hoisted_1 = { class: "template-footer" };
const _hoisted_2 = /* @__PURE__ */ createStaticVNode('<ul><li><a><p><img width="24" src="' + _imports_0 + '" alt=""></p><span>Games</span></a></li><li class="active"><a><p><img width="24" src="https://fhcp.w2.app/imgs/app.svg" alt=""></p><span>Apps</span></a></li><li><a><p><img width="24" src="' + _imports_1 + '" alt=""></p><span>Movies</span></a></li><li><a><p><img width="24" src="' + _imports_2 + '" alt=""></p><span>Books</span></a></li><li><a><p><img width="24" src="' + _imports_3 + '" alt=""></p><span>Kids</span></a></li></ul>', 1);
const _hoisted_3 = [
  _hoisted_2
];
function _sfc_render(_ctx, _cache) {
  return openBlock(), createElementBlock("div", _hoisted_1, _hoisted_3);
}
const TempFoot = /* @__PURE__ */ _export_sfc(_sfc_main$1, [["render", _sfc_render]]);
const _sfc_main = /* @__PURE__ */ defineComponent({
  __name: "App",
  setup(__props) {
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock(Fragment, null, [
        createVNode(TempHead),
        createVNode(_sfc_main$2),
        createVNode(TempFoot)
      ], 64);
    };
  }
});
createApp(_sfc_main).mount("#app");
