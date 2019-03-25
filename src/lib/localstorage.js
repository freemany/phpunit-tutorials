import config from '@/config/config';

const storeKey = config.store_key;

const getProgressPageIndex = () => {
    const page = localStorage.getItem(storeKey);
    if (null === page || undefined === page) {
        return 0;
    }
    return parseInt(page);
};

const setProgressPageIndex = (page) => {
    return localStorage.setItem(storeKey, page);
};

export {getProgressPageIndex, setProgressPageIndex};