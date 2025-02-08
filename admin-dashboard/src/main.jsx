import React, {Suspense, lazy} from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter as Router } from 'react-router-dom';
import ThemeProvider from './utils/ThemeContext';
import {CurrencyProvider} from "./contexts/CurrencyContext";
import {ExchangerateProvider} from "./contexts/ExchangerateContext";

import './css/style.css';

import { Loading } from './components/ui';
const App = lazy(() => import('./App'));

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
      <Router>
        <ThemeProvider>
          <Suspense fallback={<Loading />}>
            <CurrencyProvider>
              <ExchangerateProvider>
                <App />
              </ExchangerateProvider>
            </CurrencyProvider>
          </Suspense>
        </ThemeProvider>
      </Router>
  </React.StrictMode>
);
