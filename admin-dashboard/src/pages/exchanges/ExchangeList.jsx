import { useNavigate, NavLink } from "react-router";
import { useExchangerate } from "../../contexts/ExchangerateContext";
import { CurrencyRectangle } from "../../components/CurrencyRectangle";
import { Loading, CardAction, CardFooter, PrimaryButton } from "../../components/ui";

import { primaryButtonStyle, imageCss } from "../../components/forms";
import { transformDate } from "../../lib/utils";

export function ExchangeList() {
    const navigate = useNavigate();
    const {exchangerates} = useExchangerate();

    return (
        <section>
            <div className="mb-10 flex flex-col items-center justify-start sm:flex-row sm:justify-between gap-4">
                <h1 className='text-3xl font-medium'>Tipos de Cambio</h1>
                <NavLink to={'registrar'} className={primaryButtonStyle}>
                    Nuevo Cambio entre Monedas
                </NavLink>
            </div>
            <div className='flex flex-wrap justify-start gap-4'>
            {exchangerates.length === 0 && <p className="max-w-md">Preciona el boton <b>Nuevo Cambio entre Monedas</b> para comenzar a ofrecer cambios en tu sitio web.</p>}
            {exchangerates?.map(exchangerate => (
                <CardAction 
                    key={exchangerate.id}
                    extraClass={`items-center gap-3 p-6 max-w-sm ${exchangerate.is_default ? 'drop-shadow-md shadow-md shadow-indigo-600' : ''} `}>
                    
                    <div className="w-full flex flex-col xs:flex-row justify-between items-center gap-4">
                    <CurrencyRectangle 
                      image={exchangerate.base_image}
                      symbol={exchangerate.base_symbol}
                      amount={exchangerate.base_amount}
                    />

                    <svg  className="size-8 hidden xs:block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                    
                    <svg className="size-8 block xs:hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" >
                      <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                    </svg>
              

                      <CurrencyRectangle
                        image={exchangerate.target_image}
                        symbol={exchangerate.target_symbol}
                        amount={exchangerate.target_amount}
                      
                      />

                    </div>
                    {exchangerate.is_default ? <span className="py-1 px-2 rounded-full text-[0.75rem] font-medium bg-indigo-600 text-white">Primero</span> : ''}
                    <span className=" text-gray-500 dark:text-gray-400">Valor Actualizado el {transformDate(exchangerate.updated_at)}</span>
                    
                    

                      <div className="text-center ">
                        <p className="font-light text-sm">Tasa</p>
                        <p className="font-semibold text-3xl mb-3">{parseFloat(exchangerate.rate)}</p>
                        <PrimaryButton handleClick={() => navigate("./" + exchangerate.id)}>Actualizar</PrimaryButton>
                      </div>
                </CardAction>
            ))}
            </div>

        </section>

    );
}

