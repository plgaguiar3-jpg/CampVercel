import { useState } from "react";
import { Menu, X } from "lucide-react";
import { motion, AnimatePresence } from "framer-motion";

const navItems = [
  { label: "Início", href: "#inicio" },
  { label: "Sobre", href: "#sobre" },
  { label: "Propostas", href: "#propostas" },
  { label: "Notícias", href: "#noticias" },
  { label: "Galeria", href: "#galeria" },
  { label: "Depoimentos", href: "#depoimentos" },
  { label: "Contato", href: "#contato" },
];

const Navbar = () => {
  const [open, setOpen] = useState(false);

  return (
    <nav className="fixed top-0 left-0 right-0 z-50 bg-primary/95 backdrop-blur-md border-b border-primary-foreground/10">
      <div className="container mx-auto flex items-center justify-between h-16 px-4">
        <a href="#inicio" className="font-heading font-bold text-xl text-primary-foreground tracking-tight">
          Fátima <span className="text-accent">Gavioli</span>
        </a>

        {/* Desktop */}
        <ul className="hidden md:flex items-center gap-6">
          {navItems.map((item) => (
            <li key={item.href}>
              <a
                href={item.href}
                className="text-primary-foreground/80 hover:text-accent text-sm font-medium transition-colors"
              >
                {item.label}
              </a>
            </li>
          ))}
          <li>
            <a
              href="#contato"
              className="bg-accent text-accent-foreground px-4 py-2 rounded-md text-sm font-semibold hover:brightness-110 transition"
            >
              Junte-se a Nós
            </a>
          </li>
        </ul>

        {/* Mobile toggle */}
        <button
          onClick={() => setOpen(!open)}
          className="md:hidden text-primary-foreground"
          aria-label="Menu"
        >
          {open ? <X size={24} /> : <Menu size={24} />}
        </button>
      </div>

      {/* Mobile menu */}
      <AnimatePresence>
        {open && (
          <motion.div
            initial={{ height: 0, opacity: 0 }}
            animate={{ height: "auto", opacity: 1 }}
            exit={{ height: 0, opacity: 0 }}
            className="md:hidden bg-primary overflow-hidden"
          >
            <ul className="flex flex-col gap-2 px-4 pb-4">
              {navItems.map((item) => (
                <li key={item.href}>
                  <a
                    href={item.href}
                    onClick={() => setOpen(false)}
                    className="block py-2 text-primary-foreground/80 hover:text-accent text-sm font-medium transition-colors"
                  >
                    {item.label}
                  </a>
                </li>
              ))}
              <li>
                <a
                  href="#contato"
                  onClick={() => setOpen(false)}
                  className="block bg-accent text-accent-foreground px-4 py-2 rounded-md text-sm font-semibold text-center"
                >
                  Junte-se a Nós
                </a>
              </li>
            </ul>
          </motion.div>
        )}
      </AnimatePresence>
    </nav>
  );
};

export default Navbar;
