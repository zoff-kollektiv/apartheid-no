import domready from "domready";

const closeOtherNavigations = (current, navigations) => {
  navigations.forEach(navigation => {
    if (navigation !== current) {
      navigation.open = false;
    }
  });
};

const addEventListener = (current, navigations) => {
  current.addEventListener("toggle", event => {
    const { target } = event;
    const isOpen = target.open;

    if (isOpen) {
      closeOtherNavigations(target, navigations);
    }
  });
};

domready(() => {
  const headerNavigations = document.querySelectorAll(".header .navigation");
  Array.from(headerNavigations).forEach(navigation =>
    addEventListener(navigation, headerNavigations)
  );
});
