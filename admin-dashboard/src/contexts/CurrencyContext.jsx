import { createContext, useContext, useState, useEffect} from 'react';;
// import axios from "axios";
import api from "../services/api";

// const BASE_URL = "/wp-json/kdev-currency-api/v1/"; // Reemplaza con tu URL real

// type Currency
// {
//     id: number,
//     name: string,
//     symbol: string,
//     image: stirng | null
// }

const CurrencyContext = createContext();

export const CurrencyProvider = ({ children }) => {
  const [currencies, setCurrencies] = useState([]);

  // Cargar datos desde la API al iniciar
  useEffect(() => {
    const fetchCurrencies = async () => {
      try {
        const { data } = await api.get("currencies");
        setCurrencies(data);
      } catch (error) {
        console.error("Error al cargar intercambios:", error);
      }
    };
    fetchCurrencies();
  }, []);

  const getCurrency = (id) => {
    return currencies.filter(currency => currency.id == id)[0]
  }

  
  // Agregar una nueva moneda a la colección
  const addCurrency = (newCurrency) => {
    setCurrencies(prevCurrencies => [...prevCurrencies, newCurrency]);
  };

  // Remover una moneda de la colección por ID
  const removeCurrency = (id) => {
    setCurrencies(prevCurrencies => prevCurrencies.filter(currency => currency.id != id));
  };
  

  const updateCurrency = (id, newValue) => {
    setCurrencies(prevCurrencies =>
      prevCurrencies.map(currency =>
        currency .id == id ? newValue : currency 
      )
    );
  };

  return (
    <CurrencyContext.Provider value={{ currencies, getCurrency, addCurrency, removeCurrency, updateCurrency }}>
      {children}
    </CurrencyContext.Provider>
  );
};

export const useCurrency = () => {
  const context = useContext(CurrencyContext);
  if (!context) {
    throw new Error("useCurrency debe usarse dentro de CurrencyProvider");
  }
  return context;
};
