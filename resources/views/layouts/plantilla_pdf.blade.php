<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Citas - FisioWeb</title>
    <!-- Nota: Los PDFs no entienden bien Tailwind, así que usamos CSS clásico básico -->
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #1A5B4C; padding-bottom: 10px; }
        .header h1 { color: #1A5B4C; margin: 0; }
        .header p { color: #777; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 12px; }
        th { background-color: #f4f4f4; color: #333; text-align: left; padding: 10px; border: 1px solid #ddd; }
        td { padding: 10px; border: 1px solid #ddd; }
        .badge { padding: 3px 8px; border-radius: 10px; font-size: 10px; font-weight: bold; }
        .pendiente { color: #d97706; }
        .confirmada { color: #16a34a; }
        .cancelada { color: #dc2626; }
    </style>
</head>
<body>

    <div class="header">
        <h1>FisioWeb MX</h1>
        <p>Reporte Oficial de Citas Agendadas</p>
        <p>Fecha de generación: {{ date('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Especialidad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($citas as $cita)
            <tr>
                <td>Paciente #{{ $cita->user_id }}</td>
                <td>{{ $cita->appointment_date }}</td>
                <td>{{ $cita->appointment_time }}</td>
                <td>{{ $cita->specialty }}</td>
                <td>
                    <span class="badge {{ $cita->status }}">
                        {{ strtoupper($cita->status) }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">No hay citas registradas en el sistema.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>