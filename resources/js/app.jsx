import './bootstrap';

import React from 'react';
import ReactDOM from 'react-dom/client';

function App() {
    return (
        <div>
            React funcionando 🚀
        </div>
    );
}

const root = document.getElementById('react-app');

if (root) {
    ReactDOM.createRoot(root).render(<App />);
}