import React, { useEffect, Suspense, lazy } from 'react';
import {
  Routes,
  Route,
  useLocation,
  Navigate
} from 'react-router-dom';


import './charts/ChartjsConfig';

// Import pages
import DashboardLayout from './layouts/DashboardLayout';

import { CurrencyList, CurrencyCreate, CurrencyDetail } from './pages/currencies';
import { ExchangeList, ExchangeCreate, ExchangeDetail } from './pages/exchanges';
import { PostList, PostCreate, PostDetail } from './pages/posts';

import { Info } from './pages/info/Info';
import { Social } from './pages/social/Social';

import { Loading } from './components/ui';


function App() {

  const location = useLocation();

  useEffect(() => {
    document.querySelector('html').style.scrollBehavior = 'auto'
    window.scroll({ top: 0 })
    document.querySelector('html').style.scrollBehavior = ''
  }, [location.pathname]); // triggered on route change

  return (
    <>
      {/* <Dashboard /> */}
      <Suspense fallback={<Loading/>}>

      <Routes>
        <Route path="/admin" element={<DashboardLayout />}>
          <Route index element={<Navigate to="/admin/cambios" replace />} />
          
          <Route path="monedas"  >
            <Route index element={<CurrencyList />} />
            <Route path="registrar" element={<CurrencyCreate />} />
            <Route path=":id" element={<CurrencyDetail />} />
          </Route> 

          <Route path="cambios">
            <Route index element={<ExchangeList />} />
            <Route path="registrar" element={<ExchangeCreate />} />
            <Route path=":id" element={<ExchangeDetail />} />
          </Route>

          <Route path="publicaciones">
            <Route index element={<PostList />} />
            <Route path="registrar" element={<PostCreate />} />
            <Route path=":id" element={<PostDetail />} />
          </Route>

          <Route path="info" element={<Info />} />
          <Route path="social" element={<Social />} />

        </Route>
      </Routes>
      </Suspense>

    </>
  );
}

export default App;
