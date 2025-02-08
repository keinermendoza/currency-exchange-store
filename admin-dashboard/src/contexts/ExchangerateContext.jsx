import { createContext, useContext, useState, useEffect } from 'react';
import api from "../services/api";

// const BASE_URL = "/wp-json/kdev-currency-api/v1/"; // Reemplaza con tu URL real

// type Exchangerate
// {
    // id: number,
    // origin_currency_id: number,
    // destination_currency_id: number,
    // rate: number,
    // updated_at: string,
    // is_default: number,
    // origin_amount: number,
    // destination_amount: number
// }

const ExchangerateContext = createContext();

export const ExchangerateProvider = ({ children }) => {
  const [exchangerates, setExchangerates] = useState([]);

  // Cargar datos desde la API al iniciar
  useEffect(() => {
    const fetchExchangerates = async () => {
      try {
        const { data } = await api.get("exchangerates");
        setExchangerates(data);
      } catch (error) {
        console.error("Error al cargar intercambios:", error);
      }
    };
    fetchExchangerates();
  }, []);

  const getExchangerate = (id) => {
    return exchangerates.filter(Exchangerate => Exchangerate.id == id)[0]
  }

  
  // Agregar un tipo de cambio a la colección
  const addExchangerate = (newExchangerate) => {
    setExchangerates(prevExchangerates => [...prevExchangerates, newExchangerate]);
  };

  // Remover un tipo de cambio  de la colección por ID
  const removeExchangerate = (id) => {
    setExchangerates(prevExchangerates => prevExchangerates.filter(Exchangerate => Exchangerate.id !== id));
  };

  const updateExchangerate = (id, newValue) => {
    setExchangerates(prevExchangerates =>
      prevExchangerates.map(exchangerate =>
        exchangerate.id == id ? newValue : exchangerate
      )
    );
  };

  return (
    <ExchangerateContext.Provider value={{ exchangerates, getExchangerate, addExchangerate, removeExchangerate, updateExchangerate }}>
      {children}
    </ExchangerateContext.Provider>
  );
};

export const useExchangerate = () => {
  const context = useContext(ExchangerateContext);
  if (!context) {
    throw new Error("useExchangerate debe usarse dentro de ExchangerateProvider");
  }
  return context;
};
