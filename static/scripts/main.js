import domready from "domready";
import getYouTubeID from "get-youtube-id";

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

const initVideo = videoEl => {
  videoEl.addEventListener("click", event => {
    event.preventDefault();

    const embed = document.createElement("div");
    embed.classList.add("embed");

    const container = document.createElement("div");
    container.classList.add("embed__container");

    const iframe = document.createElement("iframe");

    iframe.setAttribute(
      "src",
      `https://www.youtube-nocookie.com/embed/${getYouTubeID(
        videoEl.href
      )}?autoplay=1&modestbranding=1&showinfo=0&controls=0`
    );
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allowfullscreen", "1");

    container.appendChild(iframe);
    embed.appendChild(container);

    videoEl.replaceWith(embed);
  });
};

domready(() => {
  const headerNavigations = document.querySelectorAll(".header .navigation");
  const videos = document.querySelectorAll(".js-video");

  Array.from(headerNavigations).forEach(navigation =>
    addEventListener(navigation, headerNavigations)
  );

  Array.from(videos).forEach(video => {
    initVideo(video);
  });
});
