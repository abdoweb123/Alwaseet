// ********************************************************************************
//Fixed Navbar
window.addEventListener("scroll", function () {
  let navbar = document.getElementById("navbar");
  let logo = document.querySelector(".navBrand");
  console.log(window.scrollY);
  if (window.scrollY > 0) {
    navbar.classList.add("navbar-fixed");
    logo.classList.add("nav-logo-fixed");
  } else {
    navbar.classList.remove("navbar-fixed");
    logo.classList.remove("nav-logo-fixed");
  }
});

// ********************************************************************************
const signUpTab = document.getElementById("pills-signUp-tab");
const signUpTabItem = document.querySelector(".sign-up-tab");

const logInTab = document.getElementById("pills-login-tab");
const logInTabItem = document.querySelector(".login-in-tab");
if (signUpTab !== null) {
  signUpTab.addEventListener("click", () => {
    signUpTabItem.classList.add("underline");
    logInTabItem.classList.remove("underline");
  });
}
if (logInTab !== null) {
  logInTab.addEventListener("click", () => {
    console.log(333);
    signUpTabItem.classList.remove("underline");
    logInTabItem.classList.add("underline");
  });
}
// *********************************************************************************
const tabMenu = document.querySelector(".tab-menu");

let activeDrag = false;
if (tabMenu !== null) {
  tabMenu.addEventListener("mousemove", (drag) => {
    console.log(tabMenu);
    if (!activeDrag) return;
    tabMenu.scrollLeft -= drag.movementX;
  });
}
if (tabMenu !== null) {
  tabMenu.addEventListener("mouseup", () => {
    activeDrag = false;
    console.log(2);
  });
}
if (tabMenu !== null) {
  tabMenu.addEventListener("mousedown", () => {
    console.log(3);
    activeDrag = true;
  });
}
//******************************************************************************** *
// let input1 = document.querySelector("#phoneSignUp");
// let input2 = document.querySelector("#phoneLogin");
let input3 = document.querySelector("#phoneEdit");
// if (input1 !== null) {
//   window.intlTelInput(input1, {});
// }
// if (input2 !== null) {
//   window.intlTelInput(input2, {});
// }

if (input3 !== null) {
  window.intlTelInput(input3, {});
}

// *********************************************************************************
let iti = window.intlTelInput(document.querySelector("#phoneSignUp"), {
  separateDialCode: true,
  onlyCountries: ["BH", "SA", "OM", "AE", "QA", "KW"],
  utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
  preferredCountries: ["BH"],
});
window.iti = iti;
document
  .querySelector("#phoneSignUp")
  .addEventListener("countrychange", function () {
    $("#phoneSignUp").val("");
    dialCode = iti.getSelectedCountryData().dialCode;
    length = 0;
    [
      {
        id: 1,
        title_ar: "\u0627\u0644\u0628\u062d\u0631\u064a\u0646",
        title_en: "Bahrain",
        currancy_code_ar:
          "\u062f\u064a\u0646\u0627\u0631 \u0628\u062d\u0631\u064a\u0646\u064a",
        currancy_code_en: "BD",
        currancy_value: "1.000",
        phone_code: "+973",
        country_code: "BH",
        length: 8,
        decimals: 3,
        lat: "25.93041400",
        long: "50.63777200",
        status: 1,
        image: "/countries/Bahrain.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:27:31.000000Z",
        currancy_code: "BD",
      },
      {
        id: 2,
        title_ar:
          "\u0627\u0644\u0645\u0645\u0644\u0643\u0629 \u0627\u0644\u0639\u0631\u0628\u064a\u0629 \u0627\u0644\u0633\u0639\u0648\u062f\u064a\u0629",
        title_en: "Saudi Arabia",
        currancy_code_ar:
          "\u0631\u064a\u0627\u0644 \u0633\u0639\u0648\u062f\u064a",
        currancy_code_en: "SR",
        currancy_value: "10.000",
        phone_code: "+966",
        country_code: "SA",
        length: 9,
        decimals: 2,
        lat: "23.88594200",
        long: "45.07916200",
        status: 1,
        image: "/countries/SaudiArabia.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:24:01.000000Z",
        currancy_code: "SR",
      },
      {
        id: 3,
        title_ar: "\u0633\u0644\u0637\u0646\u0629 \u0639\u0645\u0627\u0646",
        title_en: "Oman",
        currancy_code_ar:
          "\u0631\u064a\u0627\u0644 \u0639\u0645\u0627\u0646\u064a",
        currancy_code_en: "OR",
        currancy_value: "1.020",
        phone_code: "+968",
        country_code: "OM",
        length: 8,
        decimals: 3,
        lat: "21.51258300",
        long: "55.92325500",
        status: 1,
        image: "/countries/Oman.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:25:59.000000Z",
        currancy_code: "OR",
      },
      {
        id: 4,
        title_ar:
          "\u0627\u0644\u0625\u0645\u0627\u0631\u0627\u062a \u0627\u0644\u0639\u0631\u0628\u064a\u0629 \u0627\u0644\u0645\u062a\u062d\u062f\u0629",
        title_en: "United Arab Emirates",
        currancy_code_ar:
          "\u062f\u0631\u0647\u0645 \u0625\u0645\u0627\u0631\u0627\u062a\u064a",
        currancy_code_en: "AED",
        currancy_value: "10.000",
        phone_code: "+971",
        country_code: "AE",
        length: 9,
        decimals: 3,
        lat: "23.42407600",
        long: "53.84781800",
        status: 1,
        image: "/countries/UnitedArabEmirates.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:26:13.000000Z",
        currancy_code: "AED",
      },
      {
        id: 5,
        title_ar: "\u0642\u0637\u0631",
        title_en: "Qatar",
        currancy_code_ar: "\u0631\u064a\u0627\u0644 \u0642\u0637\u0631\u064a",
        currancy_code_en: "QR",
        currancy_value: "10.000",
        phone_code: "+974",
        country_code: "QA",
        length: 8,
        decimals: 3,
        lat: "25.35482600",
        long: "51.18388400",
        status: 1,
        image: "/countries/Qatar.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:26:37.000000Z",
        currancy_code: "QR",
      },
      {
        id: 6,
        title_ar: "\u0627\u0644\u0643\u0648\u064a\u062a",
        title_en: "Kuwait",
        currancy_code_ar:
          "\u062f\u064a\u0646\u0627\u0631 \u0643\u0648\u064a\u062a\u064a",
        currancy_code_en: "KWD",
        currancy_value: "0.810",
        phone_code: "+965",
        country_code: "KW",
        length: 8,
        decimals: 3,
        lat: "29.31166000",
        long: "47.48176600",
        status: 1,
        image: "/countries/Kuwait.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:26:52.000000Z",
        currancy_code: "KWD",
      },
    ].forEach((element) =>
      element.phone_code.includes(dialCode) ? (length = element.length) : 0
    );

    $("#phoneSignUp").attr("minlength", 8);
    $("#phoneSignUp").attr("maxlength", 8);
    $("#phoneSignUp").attr("size", 8);
  });
// *********************************************************************************
let iti1 = window.intlTelInput(document.querySelector("#phoneLogin"), {
  separateDialCode: true,
  onlyCountries: ["BH", "SA", "OM", "AE", "QA", "KW"],
  utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
  preferredCountries: ["BH"],
});
window.iti1 = iti1;
document
  .querySelector("#phoneLogin")
  .addEventListener("countrychange", function () {
    $("#phoneLogin").val("");
    dialCode = iti1.getSelectedCountryData().dialCode;
    length = 0;
    [
      {
        id: 1,
        title_ar: "\u0627\u0644\u0628\u062d\u0631\u064a\u0646",
        title_en: "Bahrain",
        currancy_code_ar:
          "\u062f\u064a\u0646\u0627\u0631 \u0628\u062d\u0631\u064a\u0646\u064a",
        currancy_code_en: "BD",
        currancy_value: "1.000",
        phone_code: "+973",
        country_code: "BH",
        length: 8,
        decimals: 3,
        lat: "25.93041400",
        long: "50.63777200",
        status: 1,
        image: "/countries/Bahrain.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:27:31.000000Z",
        currancy_code: "BD",
      },
      {
        id: 2,
        title_ar:
          "\u0627\u0644\u0645\u0645\u0644\u0643\u0629 \u0627\u0644\u0639\u0631\u0628\u064a\u0629 \u0627\u0644\u0633\u0639\u0648\u062f\u064a\u0629",
        title_en: "Saudi Arabia",
        currancy_code_ar:
          "\u0631\u064a\u0627\u0644 \u0633\u0639\u0648\u062f\u064a",
        currancy_code_en: "SR",
        currancy_value: "10.000",
        phone_code: "+966",
        country_code: "SA",
        length: 9,
        decimals: 2,
        lat: "23.88594200",
        long: "45.07916200",
        status: 1,
        image: "/countries/SaudiArabia.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:24:01.000000Z",
        currancy_code: "SR",
      },
      {
        id: 3,
        title_ar: "\u0633\u0644\u0637\u0646\u0629 \u0639\u0645\u0627\u0646",
        title_en: "Oman",
        currancy_code_ar:
          "\u0631\u064a\u0627\u0644 \u0639\u0645\u0627\u0646\u064a",
        currancy_code_en: "OR",
        currancy_value: "1.020",
        phone_code: "+968",
        country_code: "OM",
        length: 8,
        decimals: 3,
        lat: "21.51258300",
        long: "55.92325500",
        status: 1,
        image: "/countries/Oman.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:25:59.000000Z",
        currancy_code: "OR",
      },
      {
        id: 4,
        title_ar:
          "\u0627\u0644\u0625\u0645\u0627\u0631\u0627\u062a \u0627\u0644\u0639\u0631\u0628\u064a\u0629 \u0627\u0644\u0645\u062a\u062d\u062f\u0629",
        title_en: "United Arab Emirates",
        currancy_code_ar:
          "\u062f\u0631\u0647\u0645 \u0625\u0645\u0627\u0631\u0627\u062a\u064a",
        currancy_code_en: "AED",
        currancy_value: "10.000",
        phone_code: "+971",
        country_code: "AE",
        length: 9,
        decimals: 3,
        lat: "23.42407600",
        long: "53.84781800",
        status: 1,
        image: "/countries/UnitedArabEmirates.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:26:13.000000Z",
        currancy_code: "AED",
      },
      {
        id: 5,
        title_ar: "\u0642\u0637\u0631",
        title_en: "Qatar",
        currancy_code_ar: "\u0631\u064a\u0627\u0644 \u0642\u0637\u0631\u064a",
        currancy_code_en: "QR",
        currancy_value: "10.000",
        phone_code: "+974",
        country_code: "QA",
        length: 8,
        decimals: 3,
        lat: "25.35482600",
        long: "51.18388400",
        status: 1,
        image: "/countries/Qatar.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:26:37.000000Z",
        currancy_code: "QR",
      },
      {
        id: 6,
        title_ar: "\u0627\u0644\u0643\u0648\u064a\u062a",
        title_en: "Kuwait",
        currancy_code_ar:
          "\u062f\u064a\u0646\u0627\u0631 \u0643\u0648\u064a\u062a\u064a",
        currancy_code_en: "KWD",
        currancy_value: "0.810",
        phone_code: "+965",
        country_code: "KW",
        length: 8,
        decimals: 3,
        lat: "29.31166000",
        long: "47.48176600",
        status: 1,
        image: "/countries/Kuwait.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:26:52.000000Z",
        currancy_code: "KWD",
      },
    ].forEach((element) =>
      element.phone_code.includes(dialCode) ? (length = element.length) : 0
    );

    $("#phoneLogin").attr("minlength", 8);
    $("#phoneLogin").attr("maxlength", 8);
    $("#phoneLogin").attr("size", 8);
  });
// *********************************************************************************
let iti2 = window.intlTelInput(document.querySelector("#phoneEdit"), {
  separateDialCode: true,
  onlyCountries: ["BH", "SA", "OM", "AE", "QA", "KW"],
  utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
  preferredCountries: ["BH"],
});
window.iti2 = iti2;
document
  .querySelector("#phoneEdit")
  .addEventListener("countrychange", function () {
    $("#phoneEdit").val("");
    dialCode = iti2.getSelectedCountryData().dialCode;
    length = 0;
    [
      {
        id: 1,
        title_ar: "\u0627\u0644\u0628\u062d\u0631\u064a\u0646",
        title_en: "Bahrain",
        currancy_code_ar:
          "\u062f\u064a\u0646\u0627\u0631 \u0628\u062d\u0631\u064a\u0646\u064a",
        currancy_code_en: "BD",
        currancy_value: "1.000",
        phone_code: "+973",
        country_code: "BH",
        length: 8,
        decimals: 3,
        lat: "25.93041400",
        long: "50.63777200",
        status: 1,
        image: "/countries/Bahrain.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:27:31.000000Z",
        currancy_code: "BD",
      },
      {
        id: 2,
        title_ar:
          "\u0627\u0644\u0645\u0645\u0644\u0643\u0629 \u0627\u0644\u0639\u0631\u0628\u064a\u0629 \u0627\u0644\u0633\u0639\u0648\u062f\u064a\u0629",
        title_en: "Saudi Arabia",
        currancy_code_ar:
          "\u0631\u064a\u0627\u0644 \u0633\u0639\u0648\u062f\u064a",
        currancy_code_en: "SR",
        currancy_value: "10.000",
        phone_code: "+966",
        country_code: "SA",
        length: 9,
        decimals: 2,
        lat: "23.88594200",
        long: "45.07916200",
        status: 1,
        image: "/countries/SaudiArabia.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:24:01.000000Z",
        currancy_code: "SR",
      },
      {
        id: 3,
        title_ar: "\u0633\u0644\u0637\u0646\u0629 \u0639\u0645\u0627\u0646",
        title_en: "Oman",
        currancy_code_ar:
          "\u0631\u064a\u0627\u0644 \u0639\u0645\u0627\u0646\u064a",
        currancy_code_en: "OR",
        currancy_value: "1.020",
        phone_code: "+968",
        country_code: "OM",
        length: 8,
        decimals: 3,
        lat: "21.51258300",
        long: "55.92325500",
        status: 1,
        image: "/countries/Oman.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:25:59.000000Z",
        currancy_code: "OR",
      },
      {
        id: 4,
        title_ar:
          "\u0627\u0644\u0625\u0645\u0627\u0631\u0627\u062a \u0627\u0644\u0639\u0631\u0628\u064a\u0629 \u0627\u0644\u0645\u062a\u062d\u062f\u0629",
        title_en: "United Arab Emirates",
        currancy_code_ar:
          "\u062f\u0631\u0647\u0645 \u0625\u0645\u0627\u0631\u0627\u062a\u064a",
        currancy_code_en: "AED",
        currancy_value: "10.000",
        phone_code: "+971",
        country_code: "AE",
        length: 9,
        decimals: 3,
        lat: "23.42407600",
        long: "53.84781800",
        status: 1,
        image: "/countries/UnitedArabEmirates.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:26:13.000000Z",
        currancy_code: "AED",
      },
      {
        id: 5,
        title_ar: "\u0642\u0637\u0631",
        title_en: "Qatar",
        currancy_code_ar: "\u0631\u064a\u0627\u0644 \u0642\u0637\u0631\u064a",
        currancy_code_en: "QR",
        currancy_value: "10.000",
        phone_code: "+974",
        country_code: "QA",
        length: 8,
        decimals: 3,
        lat: "25.35482600",
        long: "51.18388400",
        status: 1,
        image: "/countries/Qatar.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:26:37.000000Z",
        currancy_code: "QR",
      },
      {
        id: 6,
        title_ar: "\u0627\u0644\u0643\u0648\u064a\u062a",
        title_en: "Kuwait",
        currancy_code_ar:
          "\u062f\u064a\u0646\u0627\u0631 \u0643\u0648\u064a\u062a\u064a",
        currancy_code_en: "KWD",
        currancy_value: "0.810",
        phone_code: "+965",
        country_code: "KW",
        length: 8,
        decimals: 3,
        lat: "29.31166000",
        long: "47.48176600",
        status: 1,
        image: "/countries/Kuwait.png",
        created_at: "2022-10-09T07:52:15.000000Z",
        updated_at: "2023-09-14T07:26:52.000000Z",
        currancy_code: "KWD",
      },
    ].forEach((element) =>
      element.phone_code.includes(dialCode) ? (length = element.length) : 0
    );

    $("#phoneEdit").attr("minlength", 8);
    $("#phoneEdit").attr("maxlength", 8);
    $("#phoneEdit").attr("size", 8);
  });
