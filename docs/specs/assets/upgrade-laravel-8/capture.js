// Captura dos prints da comparação visual (seção 11 da spec de upgrade)
// Rodar pelo Playwright MCP: browser_run_code_unsafe com filename apontando para este arquivo
// Trocar ROUND para 'after' na rodada do Laravel 8
async (page) => {
    const ROUND = 'after';
    const dir = `/home/joao9820/projects/casa-especializada-depilacao/docs/specs/assets/upgrade-laravel-8/${ROUND}`;
    const pages = {
        'home': '/',
        'servicos': '/servicos',
        'servico-detalhe': '/servicos/corporal-feminina',
        'promocao': '/promocoes/axilas-12-pernas-virilha-simples',
        'contato': '/contato',
        'nossa-historia': '/nossa-historia',
    };
    const viewports = { desktop: { width: 1366, height: 768 }, mobile: { width: 390, height: 844 } };
    const out = [];

    for (const [vp, size] of Object.entries(viewports)) {
        await page.setViewportSize(size);

        for (const [name, path] of Object.entries(pages)) {
            const res = await page.goto('http://localhost:8000' + path, { waitUntil: 'networkidle' });
            await page.evaluate(() => document.fonts.ready);

            // WOW.js oculta elementos até o scroll; animações e transições desligadas
            await page.addStyleTag({ content: '.wow{visibility:visible!important;animation:none!important} *,*::before,*::after{transition:none!important;animation-duration:0s!important;caret-color:transparent!important}' });

            // Carrossel da home: pausa no primeiro slide
            await page.evaluate(() => {
                if (window.jQuery && window.jQuery.fn.carousel) window.jQuery('.carousel').carousel('pause');
                document.querySelectorAll('.carousel').forEach((c) => {
                    c.querySelectorAll('.carousel-item, .carousel-indicators > *').forEach((el) =>
                        el.classList.remove('active', 'carousel-item-left', 'carousel-item-right', 'carousel-item-next', 'carousel-item-prev'));
                    c.querySelectorAll('.carousel-item:first-child, .carousel-indicators > :first-child').forEach((el) => el.classList.add('active'));
                });
            });
            await page.waitForTimeout(800);

            await page.screenshot({ path: `${dir}/${name}-${vp}.png`, fullPage: true });
            const height = await page.evaluate(() => document.documentElement.scrollHeight);
            out.push(`${res.status()} ${name}-${vp}.png (altura ${height}px)`);
        }
    }

    await page.setViewportSize(viewports.desktop);

    return out.join('\n');
}
