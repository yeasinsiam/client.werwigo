export const debounce = (func, wait) => {
    let timeout;

    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };

        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
};

export const fetchAutocompleteSuggestions = (query, successCallback) => {
    var url = `/api/hotel-location-suggestion?q=${encodeURIComponent(query)}`;

    fetch(url)
        .then((response) => response.json())
        .then((datas) => {
            successCallback(datas);
        })
        .catch((error) => {
            console.error("Error fetching autocomplete suggestions:", error);
        });
};
