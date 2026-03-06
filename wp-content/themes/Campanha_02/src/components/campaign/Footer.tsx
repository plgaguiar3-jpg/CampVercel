const Footer = () => (
  <footer className="bg-primary text-primary-foreground py-10">
    <div className="container mx-auto px-4">
      <div className="flex flex-col md:flex-row items-center justify-between gap-4">
        <div>
          <p className="font-heading font-bold text-lg">
            Fátima <span className="text-accent">Gavioli</span>
          </p>
          <p className="text-primary-foreground/60 text-xs mt-1">
            Educação, Renovação e Compromisso.
          </p>
        </div>

        <p className="text-primary-foreground/50 text-xs">
          Feito pela equipe da campanha · © 2026
        </p>
      </div>
    </div>
  </footer>
);

export default Footer;
