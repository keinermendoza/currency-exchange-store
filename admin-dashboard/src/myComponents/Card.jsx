import { primaryButtonStyle } from "./inputStyles"

export function CardAction({children, extraClass=""}) {
  return (
  <div className={`w-full bg-white border border-gray-200 rounded-lg shadow
   dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between p-5 ${extraClass} `}>
    {children}
  </div>
  )
}

export function CardFooter({children, extraClass}) {
  return (
    <div className={`flex mt-4 md:mt-6 ${extraClass}`}>
        {children}
    </div>
  )
}

export function PrimaryButton({children, handleClick=null, isDisabled=false}) {
  return (
    <button
      disabled={isDisabled}
      onClick={handleClick}
      className={primaryButtonStyle}>{children}</button>
  )
}
